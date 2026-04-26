<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin user
        if (!User::where('email', 'admin@devup.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@devup.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'level' => 10,
                'points' => 1000,
                'serie_actuelle' => 5,
            ]);
        }

        // Create Formateur users
        $formateurs = [
            [
                'name' => 'Achraf Chaoub',
                'email' => 'achraf@devup.com',
                'password' => Hash::make('password123'),
                'role' => 'formateur',
                'level' => 8,
                'points' => 800,
                'serie_actuelle' => 4,
            ],
            [
                'name' => 'Formateur Test',
                'email' => 'formateur@devup.com',
                'password' => Hash::make('password123'),
                'role' => 'formateur',
                'level' => 7,
                'points' => 700,
                'serie_actuelle' => 3,
            ],
        ];

        foreach ($formateurs as $formateur) {
            if (!User::where('email', $formateur['email'])->exists()) {
                User::create($formateur);
            }
        }

        // Create Apprenant users
        $apprenants = [
            [
                'name' => 'Mariam Ezraidi',
                'email' => 'mariam@devup.com',
                'password' => Hash::make('password123'),
                'role' => 'apprenant',
                'level' => 3,
                'points' => 250,
                'serie_actuelle' => 2,
            ],
            [
                'name' => 'Yassine Etudiant',
                'email' => 'yassine@devup.com',
                'password' => Hash::make('password123'),
                'role' => 'apprenant',
                'level' => 2,
                'points' => 150,
                'serie_actuelle' => 1,
            ],
            [
                'name' => 'Sara Debutante',
                'email' => 'sara@devup.com',
                'password' => Hash::make('password123'),
                'role' => 'apprenant',
                'level' => 1,
                'points' => 50,
                'serie_actuelle' => 1,
            ],
            [
                'name' => 'Etudiant Test 1',
                'email' => 'etudiant1@devup.com',
                'password' => Hash::make('password123'),
                'role' => 'apprenant',
                'level' => 4,
                'points' => 400,
                'serie_actuelle' => 3,
            ],
            [
                'name' => 'Etudiant Test 2',
                'email' => 'etudiant2@devup.com',
                'password' => Hash::make('password123'),
                'role' => 'apprenant',
                'level' => 5,
                'points' => 550,
                'serie_actuelle' => 3,
            ],
        ];

        foreach ($apprenants as $apprenant) {
            if (!User::where('email', $apprenant['email'])->exists()) {
                User::create($apprenant);
            }
        }

        $this->command->info('Users seeded successfully!');
        $this->command->info('Admin: admin@devup.com / password123');
        $this->command->info('Formateur: achraf@devup.com / password123');
        $this->command->info('Apprenant: mariam@devup.com / password123');
    }
}
