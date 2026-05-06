<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

echo "=== TESTING LOGIN REQUEST ===\n\n";

// Simulate login request data
$requestData = [
    'email' => 'achraf@devup.com',
    'password' => 'password123',
    'remember' => false,
];

// Create a request object
$request = Request::create('/login', 'POST', $requestData);

// Create LoginRequest and validate
$loginRequest = LoginRequest::createFromBase($request);

echo "Testing LoginRequest validation...\n";

try {
    $loginRequest->validate();
    echo "✓ Validation passed\n";
    
    // Test authentication
    echo "\nTesting authentication...\n";
    $loginRequest->authenticate();
    echo "✓ Authentication successful\n";
    
    // Check if user is logged in
    if (Auth::check()) {
        echo "✓ User is logged in\n";
        echo "  - User ID: " . Auth::id() . "\n";
        echo "  - User Email: " . Auth::user()->email . "\n";
        echo "  - User Role: " . Auth::user()->role . "\n";
    } else {
        echo "✗ User is not logged in\n";
    }
    
} catch (\Illuminate\Validation\ValidationException $e) {
    echo "✗ Validation failed:\n";
    foreach ($e->errors() as $field => $errors) {
        echo "  - $field: " . implode(', ', $errors) . "\n";
    }
} catch (\Exception $e) {
    echo "✗ Authentication failed: " . $e->getMessage() . "\n";
}

echo "\n=== END TEST ===\n";
