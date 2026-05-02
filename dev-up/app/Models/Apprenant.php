<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apprenant extends User
{
    use HasFactory;

    protected $table = 'users';

    public function scopeApprenants($query)
    {
        return $query->where('role', 'apprenant');
    }

    public function voirProgression(): array
    {
        return [
            'points_actuels' => $this->points,
            'niveau_experience' => $this->level,
            'serie_actuelle' => $this->serie_actuelle ?? 1,
            'challenges_termine' => $this->userChallenges()->where('status', 'termine')->count(),
            'sessions_terminees' => $this->focusSessions()->where('is_completed', true)->count(),
            'badges_gagnes' => $this->badges()->count(),
        ];
    }

    public function recupererRecompense(int $badgeId): bool
    {
        $badge = Badge::find($badgeId);
        
        if (!$badge) {
            return false;
        }

        if ($this->points < $badge->points_requis) {
            return false;
        }

        if ($this->badges()->where('badge_id', $badgeId)->exists()) {
            return false;
        }

        $this->badges()->attach($badgeId, ['earned_at' => now()]);
        return true;
    }
}
