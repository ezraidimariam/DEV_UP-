<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Challenge;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $challenges = [
            [
                'titre' => 'Variables et Types de Données',
                'description' => 'Créez un programme qui déclare différentes variables (entier, chaîne, booléen) et affiche leurs valeurs. Apprenez les bases des types de données en programmation.',
                'difficulte' => 'facile',
                'valeur_points' => 10,
            ],
            [
                'titre' => 'Boucles et Itérations',
                'description' => 'Implémentez un programme qui utilise des boucles pour afficher les nombres de 1 à 100, en remplaçant les multiples de 3 par "Fizz" et les multiples de 5 par "Buzz".',
                'difficulte' => 'facile',
                'valeur_points' => 15,
            ],
            [
                'titre' => 'Fonctions et Paramètres',
                'description' => 'Créez une fonction qui prend un tableau en paramètre et retourne la somme de tous les éléments. Entraînez-vous à manipuler les fonctions et les tableaux.',
                'difficulte' => 'moyen',
                'valeur_points' => 25,
            ],
            [
                'titre' => 'Gestion des Erreurs',
                'description' => 'Écrivez un programme qui gère les erreurs de division par zéro et les entrées utilisateur invalides. Apprenez les bonnes pratiques de gestion des exceptions.',
                'difficulte' => 'moyen',
                'valeur_points' => 30,
            ],
            [
                'titre' => 'Algorithmes de Tri',
                'description' => 'Implémentez au moins deux algorithmes de tri différents (tri à bulles, tri rapide) et comparez leurs performances sur des données de test.',
                'difficulte' => 'difficile',
                'valeur_points' => 50,
            ],
            [
                'titre' => 'Structure de Données - Liste Chaînée',
                'description' => 'Créez votre propre implémentation d\'une liste chaînée avec des méthodes pour ajouter, supprimer et rechercher des éléments.',
                'difficulte' => 'difficile',
                'valeur_points' => 60,
            ],
            [
                'titre' => 'Hello World',
                'description' => 'Le classique! Affichez "Hello, World!" à l\'écran. C\'est le premier pas pour tout développeur.',
                'difficulte' => 'facile',
                'valeur_points' => 5,
            ],
            [
                'titre' => 'Calculatrice Simple',
                'description' => 'Créez une calculatrice qui peut effectuer les opérations de base (+, -, *, /) avec deux nombres. Gérez les entrées utilisateur.',
                'difficulte' => 'facile',
                'valeur_points' => 20,
            ],
            [
                'titre' => 'Palindrome Checker',
                'description' => 'Écrivez une fonction qui vérifie si une chaîne de caractères est un palindrome (se lit de la même manière dans les deux sens).',
                'difficulte' => 'moyen',
                'valeur_points' => 35,
            ],
            [
                'titre' => 'API REST Simple',
                'description' => 'Créez une petite API REST avec des endpoints CRUD pour gérer une ressource (tâches, utilisateurs, produits). Utilisez un framework de votre choix.',
                'difficulte' => 'difficile',
                'valeur_points' => 75,
            ],
        ];

        foreach ($challenges as $challenge) {
            Challenge::create($challenge);
        }

        $this->command->info('Challenges seeded successfully!');
    }
}
