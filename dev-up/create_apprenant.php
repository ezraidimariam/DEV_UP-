<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

// Create apprenant user
$user = User::create([
    'name' => 'Test Student',
    'email' => 'student@devup.com',
    'password' => bcrypt('password'),
    'role' => 'apprenant',
    'level' => 1,
    'points' => 0,
]);

echo "Apprenant user created successfully!\n";
echo "Email: student@devup.com\n";
echo "Password: password\n";
