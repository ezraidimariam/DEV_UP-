<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

echo "=== DEBUGGING AUTHENTICATION ===\n\n";

// Check if user exists
$user = User::where('email', 'achraf@devup.com')->first();

if ($user) {
    echo "✓ User found:\n";
    echo "  - ID: {$user->id}\n";
    echo "  - Name: {$user->name}\n";
    echo "  - Email: {$user->email}\n";
    echo "  - Role: {$user->role}\n";
    echo "  - Created: {$user->created_at}\n\n";
    
    // Test password verification
    $password = 'password123';
    echo "Testing password: '$password'\n";
    
    if (Hash::check($password, $user->password)) {
        echo "✓ Password verification PASSED\n\n";
        
        // Test Laravel Auth attempt
        echo "Testing Laravel Auth::attempt():\n";
        
        $credentials = [
            'email' => 'achraf@devup.com',
            'password' => $password
        ];
        
        if (Auth::attempt($credentials)) {
            echo "✓ Auth::attempt() PASSED\n";
            echo "✓ User authenticated successfully\n";
        } else {
            echo "✗ Auth::attempt() FAILED\n";
            echo "This is the issue - Auth::attempt() is not working\n";
        }
        
    } else {
        echo "✗ Password verification FAILED\n";
        echo "The password hash doesn't match\n";
        
        // Show the hash for debugging
        echo "\nStored hash: {$user->password}\n";
        echo "Test hash: " . Hash::make($password) . "\n";
    }
    
} else {
    echo "✗ User NOT found in database\n";
    
    // List all users
    echo "\nAll users in database:\n";
    $users = User::all();
    foreach ($users as $u) {
        echo "  - {$u->email} ({$u->role})\n";
    }
}

echo "\n=== END DEBUG ===\n";
