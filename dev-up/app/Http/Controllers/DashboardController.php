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
        
        if ($user->isAdmin()) {
            return view('admin.dashboard', compact('user'));
        }
        
        if ($user->isFormateur()) {
            return redirect()->route('formateur.dashboard');
        }
        
        $totalPoints = $user->points;
        $currentLevel = $user->level;
        $completedChallenges = UserChallenge::where('user_id', $user->id)
            ->where('status', 'termine')
            ->count();
        $totalSessions = FocusSession::where('user_id', $user->id)
            ->where('is_completed', true)
            ->count();

        $recentChallenges = Challenge::latest()->take(3)->get();
        
        $activeChallenges = UserChallenge::where('user_id', $user->id)
            ->where('status', 'en_cours')
            ->with('challenge')
            ->get();

        $recentSessions = FocusSession::where('user_id', $user->id)
            ->latest('date_session')
            ->take(5)
            ->get();

        return view('dashboard', compact(
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
