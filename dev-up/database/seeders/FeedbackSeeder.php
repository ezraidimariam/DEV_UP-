<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Submission;
use Carbon\Carbon;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formateurs = User::where('role', 'formateur')->get();
        $submissions = Submission::all();
        
        foreach ($submissions as $submission) {
            // Only create feedback for submissions that are not pending
            if ($submission->status !== 'en_attente') {
                $formateur = $formateurs->random();
                
                $daysAgo = rand(1, 7);
                $createdAt = Carbon::now()->subDays($daysAgo);
                
                $note = null;
                $commentaire = '';
                
                if ($submission->status === 'valide') {
                    $note = rand(4, 5); // 4-5 stars for valid submissions
                    $commentaire = $this->getPositiveCommentaire($submission->challenge->difficulty);
                } elseif ($submission->status === 'refuse') {
                    $note = rand(1, 3); // 1-3 stars for rejected submissions
                    $commentaire = $this->getNegativeCommentaire($submission->challenge->difficulty);
                }
                
                Feedback::create([
                    'formateur_id' => $formateur->id,
                    'submission_id' => $submission->id,
                    'note' => $note,
                    'commentaire' => $commentaire,
                    'created_at' => $createdAt,
                ]);
            }
        }

        $this->command->info('Feedback seeded successfully!');
    }
    
    private function getPositiveCommentaire($difficulty): string
    {
        $commentaires = [
            'facile' => [
                "Excellent travail! Votre solution est parfaite pour ce niveau de difficulté. Continuez comme ça!",
                "Bravo! Vous avez bien maîtrisé les concepts de base. Le code est propre et efficace.",
                "Très bonne approche! La solution est simple et correcte. Prêt(e) pour plus de défis?",
            ],
            'moyen' => [
                "Superbe travail! Vous avez bien compris les concepts intermédiaires. La solution est bien structurée.",
                "Excellent! Votre approche est la bonne et le code est de bonne qualité. Continuez votre progression.",
                "Bravo! Vous avez réussi à résoudre un problème de niveau moyen avec une solution élégante.",
            ],
            'difficile' => [
                "Impressionnant! Vous avez maîtrisé un concept avancé avec une solution optimale. Excellent travail!",
                "Fantastique! Votre solution démontre une excellente compréhension des algorithmes complexes.",
                "Remarquable! Vous avez résolu un problème difficile avec une approche très professionnelle.",
            ],
            'easy' => [
                "Great work! Perfect solution for this difficulty level. Keep it up!",
                "Excellent! You've mastered the basic concepts well. The code is clean and efficient.",
                "Very good approach! The solution is simple and correct. Ready for more challenges?",
            ],
            'medium' => [
                "Beautiful work! You've understood intermediate concepts well. The solution is well-structured.",
                "Excellent! Your approach is correct and the code is of good quality. Continue your progress.",
                "Bravo! You solved a medium-level problem with an elegant solution.",
            ],
            'hard' => [
                "Impressive! You've mastered an advanced concept with an optimal solution. Excellent work!",
                "Fantastic! Your solution demonstrates excellent understanding of complex algorithms.",
                "Remarkable! You solved a difficult problem with a very professional approach.",
            ],
        ];
        
        // Handle null or missing difficulty
        $difficulty = $difficulty ?: 'easy';
        
        $difficultyComments = $commentaires[$difficulty] ?? $commentaires['easy'];
        return $difficultyComments[array_rand($difficultyComments)];
    }
    
    private function getNegativeCommentaire($difficulty): string
    {
        $commentaires = [
            'facile' => [
                "Votre solution a des erreurs de base. Revoyez les concepts fondamentaux et réessayez.",
                "L'approche n'est pas correcte. Prenez le temps de bien comprendre le problème avant de coder.",
                "Le code ne fonctionne pas comme attendu. Testez-le avec différents cas d'usage.",
            ],
            'moyen' => [
                "Votre solution est incomplète. Il manque des cas limites importants. Pensez à toutes les possibilités.",
                "L'algorithme n'est pas optimal. Essayez une approche plus efficace pour ce type de problème.",
                "Le code a des erreurs logiques. Déboguez étape par étape pour identifier les problèmes.",
            ],
            'difficile' => [
                "Votre approche n'est pas adaptée à la complexité du problème. Revoyez les algorithmes avancés.",
                "La solution manque d'optimisation. Pour ce niveau de difficulté, une approche plus efficace est nécessaire.",
                "Le code ne gère pas correctement tous les cas. Les problèmes complexes nécessitent plus de rigueur.",
            ],
            'easy' => [
                "Your solution has basic errors. Review the fundamental concepts and try again.",
                "The approach is not correct. Take time to understand the problem before coding.",
                "The code doesn't work as expected. Test it with different use cases.",
            ],
            'medium' => [
                "Your solution is incomplete. Important edge cases are missing. Think about all possibilities.",
                "The algorithm is not optimal. Try a more efficient approach for this type of problem.",
                "The code has logical errors. Debug step by step to identify issues.",
            ],
            'hard' => [
                "Your approach is not adapted to the problem's complexity. Review advanced algorithms.",
                "The solution lacks optimization. For this difficulty level, a more efficient approach is needed.",
                "The code doesn't handle all cases correctly. Complex problems require more rigor.",
            ],
        ];
        
        // Handle null or missing difficulty
        $difficulty = $difficulty ?: 'easy';
        
        $difficultyComments = $commentaires[$difficulty] ?? $commentaires['easy'];
        return $difficultyComments[array_rand($difficultyComments)];
    }
}
