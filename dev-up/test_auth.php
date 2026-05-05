<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Auth;

echo "=== Authentication Test ===\n";
echo "Current User ID: " . (Auth::id() ?? 'NULL') . "\n";
echo "Is Authenticated: " . (Auth::check() ? 'YES' : 'NO') . "\n";
echo "Guest Check: " . (Auth::guest() ? 'YES' : 'NO') . "\n";

if (Auth::user()) {
    echo "User Name: " . Auth::user()->name . "\n";
    echo "User Email: " . Auth::user()->email . "\n";
    echo "User Role: " . Auth::user()->role . "\n";
} else {
    echo "No authenticated user found\n";
}

echo "\n=== Session Data ===\n";
session_start();
echo "Session ID: " . session_id() . "\n";
echo "Session Data: " . print_r($_SESSION, true) . "\n";
