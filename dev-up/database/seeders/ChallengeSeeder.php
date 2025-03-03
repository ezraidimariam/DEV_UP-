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
                'title' => 'Variables et Types de Données',
                'description' => 'Créez un programme qui déclare différentes variables (entier, chaîne, booléen) et affiche leurs valeurs. Apprenez les bases des types de données en programmation.',
                'difficulty' => 'facile',
                'points' => 10,
            ],
            [
                'title' => 'Boucles et Itérations',
                'description' => 'Implémentez un programme qui utilise des boucles pour afficher les nombres de 1 à 100, en remplaçant les multiples de 3 par "Fizz" et les multiples de 5 par "Buzz".',
                'difficulty' => 'facile',
                'points' => 15,
            ],
            [
                'title' => 'Fonctions et Paramètres',
                'description' => 'Créez une fonction qui prend un tableau en paramètre et retourne la somme de tous les éléments. Entraînez-vous à manipuler les fonctions et les tableaux.',
                'difficulty' => 'moyen',
                'points' => 25,
            ],
            [
                'title' => 'Gestion des Erreurs',
                'description' => 'Écrivez un programme qui gère les erreurs de division par zéro et les entrées utilisateur invalides. Apprenez les bonnes pratiques de gestion des exceptions.',
                'difficulty' => 'moyen',
                'points' => 30,
            ],
            [
                'title' => 'Algorithmes de Tri',
                'description' => 'Implémentez au moins deux algorithmes de tri différents (tri à bulles, tri rapide) et comparez leurs performances sur des données de test.',
                'difficulty' => 'difficile',
                'points' => 50,
            ],
            [
                'title' => 'Structure de Données - Liste Chaînée',
                'description' => 'Créez votre propre implémentation d\'une liste chaînée avec des méthodes pour ajouter, supprimer et rechercher des éléments.',
                'difficulty' => 'difficile',
                'points' => 60,
            ],
            [
                'title' => 'Hello World',
                'description' => 'Le classique! Affichez "Hello, World!" à l\'écran. C\'est le premier pas pour tout développeur.',
                'difficulty' => 'facile',
                'points' => 5,
            ],
            [
                'title' => 'Calculatrice Simple',
                'description' => 'Créez une calculatrice qui peut effectuer les opérations de base (+, -, *, /) avec deux nombres. Gérez les entrées utilisateur.',
                'difficulty' => 'facile',
                'points' => 20,
            ],
            [
                'title' => 'Palindrome Checker',
                'description' => 'Écrivez une fonction qui vérifie si une chaîne de caractères est un palindrome (se lit de la même manière dans les deux sens).',
                'difficulty' => 'moyen',
                'points' => 35,
            ],
            [
                'title' => 'API REST Simple',
                'description' => 'Créez une petite API REST avec des endpoints CRUD pour gérer une ressource (tâches, utilisateurs, produits). Utilisez un framework de votre choix.',
                'difficulty' => 'difficile',
                'points' => 75,
            ],
        ];

        foreach ($challenges as $challenge) {
            Challenge::create($challenge);
        }
    }
}
