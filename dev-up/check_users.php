<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

// Get all users
$users = User::all();

echo "=== Existing Users ===\n";
foreach ($users as $user) {
    echo "Name: {$user->name}\n";
    echo "Email: {$user->email}\n";
    echo "Role: {$user->role}\n";
    echo "Level: {$user->level}\n";
    echo "Points: {$user->points}\n";
    echo "Password: password\n";
    echo "-------------------\n";
}
