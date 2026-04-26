<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FocusSession;
use App\Models\User;
use Carbon\Carbon;

class FocusSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        
        foreach ($users as $user) {
            // Create 5-10 focus sessions per user
            $sessionCount = rand(5, 10);
            
            for ($i = 0; $i < $sessionCount; $i++) {
                $daysAgo = rand(0, 30); // Sessions from last 30 days
                $sessionDate = Carbon::now()->subDays($daysAgo);
                
                // Random focus duration (25, 45, or 60 minutes)
                $focusDurations = [25, 45, 60];
                $focusDuration = $focusDurations[array_rand($focusDurations)];
                
                // Break duration (5 or 10 minutes)
                $breakDuration = $focusDuration === 25 ? 5 : 10;
                
                // 80% chance of completion
                $isCompleted = rand(1, 100) <= 80;
                
                FocusSession::create([
                    'user_id' => $user->id,
                    'focus_duration' => $focusDuration,
                    'break_duration' => $breakDuration,
                    'date_session' => $sessionDate,
                    'is_completed' => $isCompleted,
                ]);
            }
        }

        $this->command->info('Focus sessions seeded successfully!');
    }
}
