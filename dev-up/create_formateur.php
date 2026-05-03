<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

// Create formateur user
$user = User::create([
    'name' => 'Test Trainer',
    'email' => 'trainer@devup.com',
    'password' => bcrypt('password'),
    'role' => 'formateur',
    'level' => 5,
    'points' => 1000,
]);

echo "Formateur user created successfully!\n";
echo "Email: trainer@devup.com\n";
echo "Password: password\n";
