<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Challenge;
use App\Models\Submission;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        // Get admin statistics
        $stats = [
            'total_users' => User::count(),
            'total_students' => User::where('role', 'apprenant')->count(),
            'total_formateurs' => User::where('role', 'formateur')->count(),
            'total_challenges' => Challenge::count(),
            'total_submissions' => Submission::count(),
            'pending_submissions' => Submission::where('status', 'en_attente')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function challenges()
    {
        $challenges = Challenge::latest()->paginate(10);
        return view('admin.challenges', compact('challenges'));
    }

    public function createChallenge()
    {
        return view('admin.challenges.create');
    }

    public function storeChallenge(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|in:programming,design,database,algorithms,frontend,backend',
            'difficulty' => 'required|string|in:easy,medium,hard',
            'points' => 'required|integer|min:1|max:1000',
            'time_limit' => 'required|integer|min:5|max:480',
            'status' => 'required|string|in:active,inactive',
            'instructions' => 'required|string',
        ]);

        Challenge::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'difficulty' => $request->difficulty,
            'points' => $request->points,
            'time_limit' => $request->time_limit,
            'status' => $request->status,
            'instructions' => $request->instructions,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.challenges')
            ->with('success', 'Challenge created successfully!');
    }

    public function editChallenge(Challenge $challenge)
    {
        return view('admin.challenges.edit', compact('challenge'));
    }

    public function updateChallenge(Request $request, Challenge $challenge)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|in:programming,design,database,algorithms,frontend,backend',
            'difficulty' => 'required|string|in:easy,medium,hard',
            'points' => 'required|integer|min:1|max:1000',
            'time_limit' => 'required|integer|min:5|max:480',
            'status' => 'required|string|in:active,inactive',
            'instructions' => 'required|string',
        ]);

        $challenge->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'difficulty' => $request->difficulty,
            'points' => $request->points,
            'time_limit' => $request->time_limit,
            'status' => $request->status,
            'instructions' => $request->instructions,
        ]);

        return redirect()->route('admin.challenges')
            ->with('success', 'Challenge updated successfully!');
    }

    public function deleteChallenge(Challenge $challenge)
    {
        $challenge->delete();
        return redirect()->route('admin.challenges')
            ->with('success', 'Challenge deleted successfully!');
    }
}
