<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('Starting database seeding...');
        
        $this->call([
            UserSeeder::class,
            ChallengeSeeder::class,
            FocusSessionSeeder::class,
            SubmissionSeeder::class,
            BadgeSeeder::class,
            NotificationSeeder::class,
            FeedbackSeeder::class,
        ]);

        $this->command->info('Database seeding completed successfully!');
        $this->command->info('');
        $this->command->info('=== TEST USERS CREATED ===');
        $this->command->info('Admin: admin@devup.com / password123');
        $this->command->info('Formateur: achraf@devup.com / password123');
        $this->command->info('Apprenant: mariam@devup.com / password123');
        $this->command->info('==========================');
    }
}
