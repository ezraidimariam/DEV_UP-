<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== Testing DEVUP Application Models ===\n\n";

// Test User model
echo "1. Testing User Model:\n";
try {
    $user = App\Models\User::first();
    if ($user) {
        echo "✓ User found: {$user->name} (Role: {$user->role}, Level: {$user->level}, Points: {$user->points})\n";
        
        // Test role methods
        echo "  - Is Apprenant: " . ($user->isApprenant() ? 'Yes' : 'No') . "\n";
        echo "  - Is Formateur: " . ($user->isFormateur() ? 'Yes' : 'No') . "\n";
        echo "  - Is Admin: " . ($user->isAdmin() ? 'Yes' : 'No') . "\n";
        
        // Test progression method
        $progression = $user->voirProgression();
        echo "  - Progression: " . json_encode($progression) . "\n";
    } else {
        echo "✗ No users found\n";
    }
} catch (Exception $e) {
    echo "✗ User model error: " . $e->getMessage() . "\n";
}

echo "\n2. Testing Challenge Model:\n";
try {
    $challenge = App\Models\Challenge::first();
    if ($challenge) {
        echo "✓ Challenge found: {$challenge->title} (Difficulty: {$challenge->difficulty}, Points: {$challenge->points})\n";
    } else {
        echo "✗ No challenges found\n";
    }
} catch (Exception $e) {
    echo "✗ Challenge model error: " . $e->getMessage() . "\n";
}

echo "\n3. Testing Badge Model:\n";
try {
    $badge = App\Models\Badge::first();
    if ($badge) {
        echo "✓ Badge found: {$badge->nom} (Points requis: {$badge->points_requis})\n";
    } else {
        echo "✗ No badges found\n";
    }
} catch (Exception $e) {
    echo "✗ Badge model error: " . $e->getMessage() . "\n";
}

echo "\n4. Testing FocusSession Model:\n";
try {
    $session = App\Models\FocusSession::first();
    if ($session) {
        echo "✓ Focus session found: {$session->focus_duration} min focus, {$session->break_duration} min break\n";
    } else {
        echo "✗ No focus sessions found\n";
    }
} catch (Exception $e) {
    echo "✗ FocusSession model error: " . $e->getMessage() . "\n";
}

echo "\n5. Testing Relationships:\n";
try {
    $user = App\Models\User::first();
    if ($user) {
        echo "✓ User relationships:\n";
        echo "  - Focus sessions: " . $user->focusSessions()->count() . "\n";
        echo "  - User challenges: " . $user->userChallenges()->count() . "\n";
        echo "  - Submissions: " . $user->submissions()->count() . "\n";
        echo "  - Badges: " . $user->badges()->count() . "\n";
        echo "  - Notifications: " . $user->notifications()->count() . "\n";
    }
} catch (Exception $e) {
    echo "✗ Relationship error: " . $e->getMessage() . "\n";
}

echo "\n6. Testing Challenge Relationships:\n";
try {
    $challenge = App\Models\Challenge::first();
    if ($challenge) {
        echo "✓ Challenge relationships:\n";
        echo "  - User challenges: " . $challenge->userChallenges()->count() . "\n";
        echo "  - Submissions: " . $challenge->submissions()->count() . "\n";
    }
} catch (Exception $e) {
    echo "✗ Challenge relationship error: " . $e->getMessage() . "\n";
}

echo "\n=== Test Complete ===\n";
