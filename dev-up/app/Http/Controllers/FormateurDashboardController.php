<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Submission;
use App\Models\Challenge;
use App\Models\UserChallenge;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormateurDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $stats = [
            'total_students' => User::where('role', 'apprenant')->count(),
            'pending_submissions' => Submission::where('status', 'en_attente')->count(),
            'completed_challenges' => UserChallenge::where('status', 'termine')->count(),
            'total_feedback_given' => Feedback::where('formateur_id', $user->id)->count(),
        ];

        $pendingSubmissions = Submission::with(['user', 'challenge'])
            ->where('status', 'en_attente')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $recentFeedback = Feedback::with(['submission.user', 'submission.challenge'])
            ->where('formateur_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $studentProgress = User::where('role', 'apprenant')
            ->withCount(['userChallenges' => function($query) {
                $query->where('status', 'termine');
            }])
            ->withCount(['focusSessions' => function($query) {
                $query->where('is_completed', true);
            }])
            ->orderBy('user_challenges_count', 'desc')
            ->take(5)
            ->get();

        return view('formateur.dashboard', compact(
            'stats',
            'pendingSubmissions',
            'recentFeedback',
            'studentProgress'
        ));
    }

    public function submissions()
    {
        $submissions = Submission::with(['user', 'challenge', 'feedback'])
            ->where('status', 'en_attente')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('formateur.submissions', compact('submissions'));
    }

    public function reviewSubmission(Submission $submission)
    {
        $submission->load(['user', 'challenge', 'feedback']);
        
        return view('formateur.review', compact('submission'));
    }

    public function submitFeedback(Request $request, Submission $submission)
    {
        $request->validate([
            'commentaire' => 'required|string',
            'note' => 'required|integer|min:0|max:20',
        ]);

        $user = Auth::user();
        
        $feedback = $user->ajouterFeedback($submission->id, $request->commentaire, $request->note);

        if ($feedback) {
            return redirect()->route('formateur.submissions')
                ->with('success', 'Feedback submitted successfully!');
        }

        return back()->with('error', 'Failed to submit feedback.');
    }

    public function students()
    {
        $students = User::where('role', 'apprenant')
            ->withCount(['userChallenges' => function($query) {
                $query->where('status', 'termine');
            }])
            ->withCount(['focusSessions' => function($query) {
                $query->where('is_completed', true);
            }])
            ->withCount(['submissions'])
            ->orderBy('points', 'desc')
            ->paginate(10);

        return view('formateur.students', compact('students'));
    }

    public function studentProgress(User $student)
    {
        $student->load([
            'userChallenges.challenge',
            'focusSessions',
            'submissions.challenge',
            'badges'
        ]);

        $progress = $student->voirProgression();

        return view('formateur.student-progress', compact('student', 'progress'));
    }

    public function feedback()
    {
        $feedback = Feedback::with(['submission.user', 'submission.challenge'])
            ->where('formateur_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('formateur.feedback', compact('feedback'));
    }

    public function analytics()
    {
        $totalStudents = User::where('role', 'apprenant')->count();
        $totalSubmissions = Submission::count();
        $pendingSubmissions = Submission::where('status', 'en_attente')->count();
        $completedChallenges = UserChallenge::where('status', 'termine')->count();

        $challengeStats = Challenge::withCount(['userChallenges' => function($query) {
                $query->where('status', 'termine');
            }])
            ->withCount('userChallenges')
            ->get()
            ->map(function($challenge) {
                $completionRate = $challenge->user_challenges_count > 0 
                    ? ($challenge->user_challenges_count_where_status_termine / $challenge->user_challenges_count) * 100 
                    : 0;
                return [
                    'title' => $challenge->title,
                    'total_attempts' => $challenge->user_challenges_count,
                    'completions' => $challenge->user_challenges_count_where_status_termine,
                    'completion_rate' => round($completionRate, 2),
                ];
            });

        $levelDistribution = User::where('role', 'apprenant')
            ->selectRaw('level, COUNT(*) as count')
            ->groupBy('level')
            ->orderBy('level')
            ->get();

        return view('formateur.analytics', compact(
            'totalStudents',
            'totalSubmissions', 
            'pendingSubmissions',
            'completedChallenges',
            'challengeStats',
            'levelDistribution'
        ));
    }
}
