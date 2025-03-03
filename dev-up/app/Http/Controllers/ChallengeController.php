<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Challenge;
use App\Models\UserChallenge;
use App\Models\Submission;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = Challenge::latest()->paginate(12);
        $userChallengeIds = UserChallenge::where('user_id', Auth::id())
            ->pluck('challenge_id')
            ->toArray();

        return view('challenges.index', compact('challenges', 'userChallengeIds'));
    }

    public function show(Challenge $challenge)
    {
        $userChallenge = UserChallenge::where('user_id', Auth::id())
            ->where('challenge_id', $challenge->id)
            ->first();

        $submission = null;
        if ($userChallenge) {
            $submission = Submission::where('user_id', Auth::id())
                ->where('challenge_id', $challenge->id)
                ->latest()
                ->first();
        }

        return view('challenges.show', compact('challenge', 'userChallenge', 'submission'));
    }

    public function start(Challenge $challenge)
    {
        $existingChallenge = UserChallenge::where('user_id', Auth::id())
            ->where('challenge_id', $challenge->id)
            ->first();

        if (!$existingChallenge) {
            UserChallenge::create([
                'user_id' => Auth::id(),
                'challenge_id' => $challenge->id,
                'status' => 'en_cours',
            ]);
        }

        return redirect()->route('challenges.show', $challenge->id)
            ->with('success', 'Challenge démarré avec succès!');
    }

    public function submit(Request $request, Challenge $challenge)
    {
        $request->validate([
            'solution' => 'required|string|min:10',
        ]);

        $userChallenge = UserChallenge::where('user_id', Auth::id())
            ->where('challenge_id', $challenge->id)
            ->firstOrFail();

        $submission = Submission::create([
            'user_id' => Auth::id(),
            'challenge_id' => $challenge->id,
            'solution' => $request->solution,
            'status' => 'en_attente',
        ]);

        return redirect()->route('challenges.show', $challenge->id)
            ->with('success', 'Solution soumise avec succès! Elle sera examinée par un formateur.');
    }

    public function myChallenges()
    {
        $userChallenges = UserChallenge::where('user_id', Auth::id())
            ->with('challenge')
            ->latest()
            ->paginate(10);

        return view('challenges.my-challenges', compact('userChallenges'));
    }
}
