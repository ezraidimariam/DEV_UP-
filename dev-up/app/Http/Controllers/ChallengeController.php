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
        // Double-check authentication
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $challenges = Challenge::latest()->paginate(12);
        $userChallengeIds = UserChallenge::where('user_id', Auth::id())
            ->pluck('challenge_id')
            ->toArray();

        return view('challenges.index', compact('challenges', 'userChallengeIds'));
    }

    public function show(Challenge $challenge)
    {
        // Double-check authentication
        if (!Auth::check()) {
            return redirect()->route('login');
        }

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

    public function submitForm(Challenge $challenge)
    {
        // Check if user has started this challenge
        $userChallenge = UserChallenge::where('user_id', Auth::id())
            ->where('challenge_id', $challenge->id)
            ->first();

        if (!$userChallenge) {
            return redirect()->route('challenges.show', $challenge->id)
                ->with('error', 'You must start the challenge first!');
        }

        return view('challenges.submit', compact('challenge', 'userChallenge'));
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

    public function runCode(Request $request, Challenge $challenge)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        // Simulate code execution (in real implementation, this would use a sandbox)
        $code = $request->code;
        $testCases = [
            ['input' => '[1, 2, 3]', 'expected' => '[1, 4, 9]'],
            ['input' => '[0, -1, 2]', 'expected' => '[0, 1, 4]'],
        ];

        $results = [];
        foreach ($testCases as $index => $testCase) {
            // Simple simulation - in real app, this would execute the code
            $results[] = [
                'test_case' => $index + 1,
                'input' => $testCase['input'],
                'expected' => $testCase['expected'],
                'actual' => $testCase['expected'], // Simulated success
                'status' => 'pass'
            ];
        }

        return response()->json([
            'success' => true,
            'results' => $results
        ]);
    }

    public function resetCode(Challenge $challenge)
    {
        // Get the original code template for this challenge
        $templateCode = "// Write your solution here\nfunction solution() {\n    // Your code here\n    return result;\n}";

        return response()->json([
            'success' => true,
            'code' => $templateCode
        ]);
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
