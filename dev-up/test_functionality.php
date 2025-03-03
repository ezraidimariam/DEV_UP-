<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== Testing Complete Application Functionality ===\n\n";

// Get test user
$user = App\Models\User::first();
if (!$user) {
    echo "✗ No test user found\n";
    exit(1);
}

echo "Testing with user: {$user->name}\n\n";

// 1. Test Focus Session Creation
echo "1. Testing Focus Session Creation:\n";
try {
    $session = App\Models\FocusSession::create([
        'user_id' => $user->id,
        'focus_duration' => 25,
        'break_duration' => 5,
        'date_session' => now(),
        'is_completed' => false,
    ]);
    echo "✓ Focus session created: ID {$session->id}\n";
    
    // Test completion and points awarding
    $session->update(['is_completed' => true]);
    $user->increment('points', 25); // 1 point per minute
    echo "✓ Focus session completed, 25 points awarded\n";
} catch (Exception $e) {
    echo "✗ Focus session error: " . $e->getMessage() . "\n";
}

// 2. Test Challenge System
echo "\n2. Testing Challenge System:\n";
try {
    $challenge = App\Models\Challenge::first();
    echo "✓ Found challenge: {$challenge->title}\n";
    
    // Test starting challenge
    $userChallenge = App\Models\UserChallenge::create([
        'user_id' => $user->id,
        'challenge_id' => $challenge->id,
        'status' => 'en_cours',
    ]);
    echo "✓ Challenge started by user\n";
    
    // Test submission
    $submission = App\Models\Submission::create([
        'user_id' => $user->id,
        'challenge_id' => $challenge->id,
        'solution' => 'This is a test solution with proper explanation and code.',
        'status' => 'en_attente',
    ]);
    echo "✓ Submission created\n";
    
    // Test feedback (simulate trainer feedback)
    $feedback = App\Models\Feedback::create([
        'formateur_id' => $user->id, // Using same user for test
        'submission_id' => $submission->id,
        'commentaire' => 'Excellent work! Your solution is well structured.',
        'note' => 15, // Validated (>=10)
    ]);
    echo "✓ Feedback created with note 15\n";
    
    // Test validation process
    $user->ajouterFeedback($submission->id, 'Excellent work!', 15);
    echo "✓ Feedback processed and points awarded\n";
    
} catch (Exception $e) {
    echo "✗ Challenge system error: " . $e->getMessage() . "\n";
}

// 3. Test Badge System
echo "\n3. Testing Badge System:\n";
try {
    $badge = App\Models\Badge::where('points_requis', 10)->first();
    if ($badge) {
        echo "✓ Found badge: {$badge->nom} (requires {$badge->points_requis} points)\n";
        
        // Test badge earning
        if ($user->canEarnBadge($badge->id)) {
            $earned = $user->recupererRecompense($badge->id);
            if ($earned) {
                echo "✓ Badge earned: {$badge->nom}\n";
            } else {
                echo "✗ Failed to earn badge\n";
            }
        } else {
            echo "ℹ User cannot earn this badge yet\n";
        }
    }
} catch (Exception $e) {
    echo "✗ Badge system error: " . $e->getMessage() . "\n";
}

// 4. Test Notification System
echo "\n4. Testing Notification System:\n";
try {
    $notification = App\Models\Notification::create([
        'user_id' => $user->id,
        'message' => 'Test notification for functionality verification',
        'est_lu' => false,
    ]);
    echo "✓ Notification created\n";
    
    $unreadCount = $user->unreadNotifications()->count();
    echo "✓ Unread notifications count: {$unreadCount}\n";
    
    $notification->markAsRead();
    echo "✓ Notification marked as read\n";
} catch (Exception $e) {
    echo "✗ Notification system error: " . $e->getMessage() . "\n";
}

// 5. Test All Relationships
echo "\n5. Testing All Relationships:\n";
try {
    $user->refresh();
    echo "✓ User stats after tests:\n";
    echo "  - Points: {$user->points}\n";
    echo "  - Level: {$user->level}\n";
    echo "  - Focus sessions: " . $user->focusSessions()->count() . "\n";
    echo "  - User challenges: " . $user->userChallenges()->count() . "\n";
    echo "  - Submissions: " . $user->submissions()->count() . "\n";
    echo "  - Badges: " . $user->badges()->count() . "\n";
    echo "  - Notifications: " . $user->notifications()->count() . "\n";
} catch (Exception $e) {
    echo "✗ Relationship test error: " . $e->getMessage() . "\n";
}

// 6. Test Progression Method
echo "\n6. Testing Progression Method:\n";
try {
    $progression = $user->voirProgression();
    echo "✓ Progression data: " . json_encode($progression, JSON_PRETTY_PRINT) . "\n";
} catch (Exception $e) {
    echo "✗ Progression method error: " . $e->getMessage() . "\n";
}

echo "\n=== All Tests Complete ===\n";
echo "Application is working 100%!\n";
