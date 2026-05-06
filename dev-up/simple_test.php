<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Auth;

echo "=== SIMPLE AUTHENTICATION TEST ===\n\n";

// Clear any existing auth
Auth::logout();

// Get the user
$user = User::where('email', 'achraf@devup.com')->first();

if (!$user) {
    echo "✗ User not found\n";
    exit;
}

echo "✓ User found: {$user->email} ({$user->role})\n";

// Test 1: Direct password check
echo "\nTest 1: Direct password check\n";
if (password_verify('password123', $user->password)) {
    echo "✓ Password verification passed\n";
} else {
    echo "✗ Password verification failed\n";
}

// Test 2: Laravel Auth::attempt
echo "\nTest 2: Laravel Auth::attempt\n";
$credentials = [
    'email' => 'achraf@devup.com',
    'password' => 'password123'
];

if (Auth::attempt($credentials)) {
    echo "✓ Auth::attempt() passed\n";
    echo "✓ User is now authenticated\n";
    echo "  - Auth ID: " . Auth::id() . "\n";
    echo "  - Auth User: " . Auth::user()->email . "\n";
} else {
    echo "✗ Auth::attempt() failed\n";
}

// Test 3: Manual login
echo "\nTest 3: Manual login\n";
Auth::login($user);
if (Auth::check()) {
    echo "✓ Manual login successful\n";
    echo "  - Auth ID: " . Auth::id() . "\n";
} else {
    echo "✗ Manual login failed\n";
}

echo "\n=== END TEST ===\n";
