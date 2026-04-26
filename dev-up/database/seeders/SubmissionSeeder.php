<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Submission;
use App\Models\User;
use App\Models\Challenge;
use Carbon\Carbon;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apprenants = User::where('role', 'apprenant')->get();
        $challenges = Challenge::all();
        
        foreach ($apprenants as $apprenant) {
            // Each apprenant submits 3-7 challenges
            $submissionCount = rand(3, 7);
            $selectedChallenges = $challenges->random($submissionCount);
            
            foreach ($selectedChallenges as $challenge) {
                $daysAgo = rand(1, 20);
                $submissionDate = Carbon::now()->subDays($daysAgo);
                
                // Random status with weighted distribution
                $statusWeights = ['en_attente' => 20, 'valide' => 60, 'refuse' => 20];
                $status = $this->getWeightedRandom($statusWeights);
                
                $feedback = '';
                if ($status === 'valide') {
                    $feedback = $this->getPositiveFeedback();
                } elseif ($status === 'refuse') {
                    $feedback = $this->getNegativeFeedback();
                }
                
                Submission::create([
                    'user_id' => $apprenant->id,
                    'challenge_id' => $challenge->id,
                    'solution' => $this->generateSampleSolution($challenge->difficulty),
                    'status' => $status,
                    'feedback' => $feedback,
                    'created_at' => $submissionDate,
                ]);
            }
        }

        $this->command->info('Submissions seeded successfully!');
    }
    
    private function getWeightedRandom(array $weights): string
    {
        $total = array_sum($weights);
        $random = rand(1, $total);
        
        foreach ($weights as $value => $weight) {
            $random -= $weight;
            if ($random <= 0) {
                return $value;
            }
        }
        
        return array_key_first($weights);
    }
    
    private function generateSampleSolution(string $difficulty): string
    {
        $solutions = [
            'facile' => "```python\n# Solution simple\ndef hello_world():\n    print('Hello, World!')\n    return True\n\nhello_world()\n```",
            'moyen' => "```python\n# Solution intermédiaire\ndef calculate_sum(numbers):\n    total = 0\n    for num in numbers:\n        total += num\n    return total\n\n# Test\nresult = calculate_sum([1, 2, 3, 4, 5])\nprint(f'Sum: {result}')\n```",
            'difficile' => "```python\n# Solution avancée\nclass LinkedList:\n    def __init__(self):\n        self.head = None\n    \n    def append(self, data):\n        new_node = Node(data)\n        if not self.head:\n            self.head = new_node\n            return\n        last = self.head\n        while last.next:\n            last = last.next\n        last.next = new_node\n    \n    def display(self):\n        elements = []\n        current = self.head\n        while current:\n            elements.append(str(current.data))\n            current = current.next\n        print(' -> '.join(elements))\n\nclass Node:\n    def __init__(self, data):\n        self.data = data\n        self.next = None\n\n# Test\nll = LinkedList()\nll.append(1)\nll.append(2)\nll.append(3)\nll.display()\n```",
        ];
        
        return $solutions[$difficulty] ?? $solutions['facile'];
    }
    
    private function getPositiveFeedback(): string
    {
        $feedbacks = [
            "Excellent travail! Votre solution est correcte et bien structurée.",
            "Bravo! Vous avez bien compris le concept et l'implémentation est propre.",
            "Très bonne solution! Le code est clair et efficace.",
            "Parfait! Votre approche est la bonne et le code fonctionne correctement.",
            "Superbe travail! La solution est optimisée et bien documentée.",
        ];
        
        return $feedbacks[array_rand($feedbacks)];
    }
    
    private function getNegativeFeedback(): string
    {
        $feedbacks = [
            "Votre solution ne compile pas. Vérifiez la syntaxe et réessayez.",
            "L'approche est incorrecte. Revoyez les concepts de base de ce problème.",
            "Le code a des erreurs logiques. Testez avec différents cas d'usage.",
            "La solution est incomplète. Il manque des cas limites importants.",
            "L'algorithme n'est pas optimal. Essayez une approche plus efficace.",
        ];
        
        return $feedbacks[array_rand($feedbacks)];
    }
}
