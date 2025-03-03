<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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
});

require __DIR__.'/auth.php';
