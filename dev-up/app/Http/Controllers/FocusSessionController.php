<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FocusSession;

class FocusSessionController extends Controller
{
    public function index()
    {
        $sessions = FocusSession::where('user_id', Auth::id())
            ->latest('date_session')
            ->paginate(10);

        return view('focus-sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('focus-sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'focus_duration' => 'required|integer|min:1|max:120',
            'break_duration' => 'required|integer|min:1|max:30',
        ]);

        $session = FocusSession::create([
            'user_id' => Auth::id(),
            'focus_duration' => $request->focus_duration,
            'break_duration' => $request->break_duration,
            'date_session' => now(),
            'is_completed' => false,
        ]);

        return redirect()->route('focus-sessions.timer', $session->id)
            ->with('success', 'Session de focus créée avec succès!');
    }

    public function timer(FocusSession $session)
    {
        if ($session->user_id !== Auth::id()) {
            abort(403);
        }

        return view('focus-sessions.timer', compact('session'));
    }

    public function complete(FocusSession $session)
    {
        if ($session->user_id !== Auth::id()) {
            abort(403);
        }

        $session->update([
            'is_completed' => true,
        ]);

        // Award points to user for completing a session
        $user = Auth::user();
        $pointsEarned = $session->focus_duration; // 1 point per minute of focus
        $user->increment('points', $pointsEarned);

        // Check if user should level up (every 100 points)
        if ($user->points >= $user->level * 100) {
            $user->increment('level');
        }

        return redirect()->route('dashboard')
            ->with('success', "Félicitations! Session terminée. Vous avez gagné {$pointsEarned} points!");
    }
}
