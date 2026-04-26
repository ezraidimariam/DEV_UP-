<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Badge;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $badges = [
            [
                'nom' => 'Débutant Motivé',
                'url_icone' => '🌟',
                'description_requis' => 'Obtenez 50 points en complétant des challenges et sessions de focus.',
                'points_requis' => 50,
            ],
            [
                'nom' => 'Développeur Persévérant',
                'url_icone' => '💪',
                'description_requis' => 'Obtenez 150 points et terminez 5 challenges.',
                'points_requis' => 150,
            ],
            [
                'nom' => 'Maître du Focus',
                'url_icone' => '🎯',
                'description_requis' => 'Complétez 20 sessions de focus et obtenez 200 points.',
                'points_requis' => 200,
            ],
            [
                'nom' => 'Expert en Challenges',
                'url_icone' => '🏆',
                'description_requis' => 'Terminez 10 challenges avec succès.',
                'points_requis' => 300,
            ],
            [
                'nom' => 'Légende du Code',
                'url_icone' => '👑',
                'description_requis' => 'Atteignez le niveau 10 et obtenez 500 points.',
                'points_requis' => 500,
            ],
            [
                'nom' => 'Premiers Pas',
                'url_icone' => '👶',
                'description_requis' => 'Complétez votre premier challenge.',
                'points_requis' => 10,
            ],
            [
                'nom' => 'Timer Champion',
                'url_icone' => '⏰',
                'description_requis' => 'Complétez 10 sessions de focus.',
                'points_requis' => 100,
            ],
            [
                'nom' => 'Challenge Warrior',
                'url_icone' => '⚔️',
                'description_requis' => 'Terminez 5 challenges de difficulté moyenne.',
                'points_requis' => 250,
            ],
            [
                'nom' => 'Focus Master',
                'url_icone' => '🧘',
                'description_requis' => 'Accumulez 300 minutes de focus.',
                'points_requis' => 180,
            ],
            [
                'nom' => 'Code Ninja',
                'url_icone' => '🥷',
                'description_requis' => 'Terminez un challenge de difficulté difficile.',
                'points_requis' => 350,
            ],
        ];

        foreach ($badges as $badge) {
            Badge::create($badge);
        }

        $this->command->info('Badges seeded successfully!');
    }
}
