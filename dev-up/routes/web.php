<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormateurDashboardController;
use App\Http\Controllers\FocusSessionController;
use App\Http\Controllers\ChallengeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Focus Sessions
    Route::get('/focus-sessions', [FocusSessionController::class, 'index'])->name('focus-sessions.index');
    Route::get('/focus-sessions/create', [FocusSessionController::class, 'create'])->name('focus-sessions.create');
    Route::post('/focus-sessions', [FocusSessionController::class, 'store'])->name('focus-sessions.store');
    Route::get('/focus-sessions/{session}/timer', [FocusSessionController::class, 'timer'])->name('focus-sessions.timer');
    Route::post('/focus-sessions/{session}/complete', [FocusSessionController::class, 'complete'])->name('focus-sessions.complete');
    
    // Challenges
    Route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
    Route::get('/challenges/my', [ChallengeController::class, 'myChallenges'])->name('challenges.my');
    Route::get('/challenges/{challenge}', [ChallengeController::class, 'show'])->name('challenges.show');
    Route::post('/challenges/{challenge}/start', [ChallengeController::class, 'start'])->name('challenges.start');
    Route::post('/challenges/{challenge}/submit', [ChallengeController::class, 'submit'])->name('challenges.submit');
    
    // Formateur (Trainer) Routes
    Route::middleware(['auth', 'role:formateur'])->prefix('formateur')->name('formateur.')->group(function () {
        Route::get('/dashboard', [FormateurDashboardController::class, 'index'])->name('dashboard');
        Route::get('/submissions', [FormateurDashboardController::class, 'submissions'])->name('submissions');
        Route::get('/submissions/{submission}/review', [FormateurDashboardController::class, 'reviewSubmission'])->name('review');
        Route::post('/submissions/{submission}/feedback', [FormateurDashboardController::class, 'submitFeedback'])->name('feedback.submit');
        Route::get('/students', [FormateurDashboardController::class, 'students'])->name('students');
        Route::get('/students/{student}/progress', [FormateurDashboardController::class, 'studentProgress'])->name('student.progress');
        Route::get('/feedback', [FormateurDashboardController::class, 'feedback'])->name('feedback');
        Route::get('/analytics', [FormateurDashboardController::class, 'analytics'])->name('analytics');
    });
});

require __DIR__.'/auth.php';
