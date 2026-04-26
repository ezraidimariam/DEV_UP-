<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        
        foreach ($users as $user) {
            // Create 3-8 notifications per user
            $notificationCount = rand(3, 8);
            
            for ($i = 0; $i < $notificationCount; $i++) {
                $daysAgo = rand(0, 14);
                $createdAt = Carbon::now()->subDays($daysAgo);
                
                // Random notification types
                $types = ['challenge', 'session', 'badge', 'feedback', 'system'];
                $type = $types[array_rand($types)];
                
                $title = $this->getNotificationTitle($type);
                $message = $this->getNotificationMessage($type, $user->name);
                $url = $this->getNotificationUrl($type);
                
                // 70% chance of being read
                $isRead = rand(1, 100) <= 70;
                
                Notification::create([
                    'user_id' => $user->id,
                    'message' => $title . ' - ' . $message,
                    'est_lu' => $isRead,
                    'created_at' => $createdAt,
                ]);
            }
        }

        $this->command->info('Notifications seeded successfully!');
    }
    
    private function getNotificationTitle(string $type): string
    {
        $titles = [
            'challenge' => 'Nouveau Challenge Disponible!',
            'session' => 'Session de Focus Terminée',
            'badge' => 'Nouveau Badge Débloqué!',
            'feedback' => 'Feedback Reçu',
            'system' => 'Mise à Jour du Système',
        ];
        
        return $titles[$type] ?? 'Notification';
    }
    
    private function getNotificationMessage(string $type, string $userName): string
    {
        $messages = [
            'challenge' => [
                "Bonjour {$userName}, un nouveau challenge vous attend! Testez vos compétences et gagnez des points.",
                "Hey {$userName}! Un challenge intéressant vient d'être publié. Venez le relever!",
                "Salut {$userName}, prêt(e) pour un nouveau défi? Un challenge vous attend.",
            ],
            'session' => [
                "Félicitations {$userName}! Vous avez terminé votre session de focus avec succès.",
                "Bravo {$userName}! Votre session de concentration est terminée. Continuez comme ça!",
                "Super {$userName}! Session de focus complétée. Vous gagnez des points!",
            ],
            'badge' => [
                "Incroyable {$userName}! Vous avez débloqué un nouveau badge. Continuez votre progression!",
                "Félicitations {$userName}! Un nouveau badge a été ajouté à votre collection.",
                "Wow {$userName}! Badge débloqué! Vous êtes sur la bonne voie.",
            ],
            'feedback' => [
                "Bonjour {$userName}, vous avez reçu un feedback sur votre dernière soumission.",
                "Hey {$userName}, votre formateur a commenté votre solution. Venez le consulter!",
                "Salut {$userName}, un nouveau feedback vous attend dans votre espace.",
            ],
            'system' => [
                "Bonjour {$userName}, DEV↑UP a été mis à jour avec de nouvelles fonctionnalités.",
                "Hey {$userName}, découvrez les dernières améliorations de la plateforme.",
                "Salut {$userName}, nous avons amélioré votre expérience sur DEV↑UP.",
            ],
        ];
        
        $typeMessages = $messages[$type] ?? ['Notification système.'];
        return $typeMessages[array_rand($typeMessages)];
    }
    
    private function getNotificationUrl(string $type): string
    {
        $urls = [
            'challenge' => '/challenges',
            'session' => '/focus-sessions',
            'badge' => '/dashboard',
            'feedback' => '/challenges/my',
            'system' => '/dashboard',
        ];
        
        return $urls[$type] ?? '/dashboard';
    }
}
