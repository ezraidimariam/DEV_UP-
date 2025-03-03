<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Challenge;
use App\Models\UserChallenge;
use App\Models\FocusSession;
use App\Models\Submission;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get user stats
        $totalPoints = $user->points;
        $currentLevel = $user->level;
        $completedChallenges = UserChallenge::where('user_id', $user->id)
            ->where('status', 'termine')
            ->count();
        $totalSessions = FocusSession::where('user_id', $user->id)
            ->where('is_completed', true)
            ->count();

        // Get recent challenges
        $recentChallenges = Challenge::latest()->take(3)->get();
        
        // Get user's active challenges
        $activeChallenges = UserChallenge::where('user_id', $user->id)
            ->where('status', 'en_cours')
            ->with('challenge')
            ->get();

        // Get recent sessions
        $recentSessions = FocusSession::where('user_id', $user->id)
            ->latest('date_session')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'user',
            'totalPoints',
            'currentLevel',
            'completedChallenges',
            'totalSessions',
            'recentChallenges',
            'activeChallenges',
            'recentSessions'
        ));
    }
}
