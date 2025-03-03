<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'points',
        'role',
        'serie_actuelle',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function focusSessions()
    {
        return $this->hasMany(FocusSession::class);
    }

    public function userChallenges()
    {
        return $this->hasMany(UserChallenge::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function challenges()
    {
        return $this->belongsToMany(Challenge::class, 'user_challenges');
    }

    public function isApprenant()
    {
        return $this->role === 'apprenant';
    }

    public function isFormateur()
    {
        return $this->role === 'formateur';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Missing relationships from diagram
    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badge')
            ->withPivot('earned_at')
            ->withTimestamps();
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function feedbackGiven()
    {
        return $this->hasMany(Feedback::class, 'formateur_id');
    }

    // Methods for Apprenant role
    public function voirProgression()
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

    public function recupererRecompense($badgeId)
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

    // Methods for Formateur role
    public function examinerSoumission($submissionId)
    {
        return Submission::with(['user', 'challenge', 'feedback'])
            ->find($submissionId);
    }

    public function ajouterFeedback($submissionId, $commentaire, $note = 0)
    {
        $submission = Submission::find($submissionId);
        
        if (!$submission) {
            return false;
        }

        $feedback = Feedback::create([
            'formateur_id' => $this->id,
            'submission_id' => $submissionId,
            'commentaire' => $commentaire,
            'note' => $note,
        ]);

        // Update submission status and feedback
        $submission->update([
            'status' => $note >= 10 ? 'valide' : 'refuse',
            'feedback' => $commentaire,
        ]);

        // If validated, award points and mark challenge as completed
        if ($note >= 10) {
            $user = $submission->user;
            $user->increment('points', $submission->challenge->points);
            
            // Check level up
            if ($user->points >= $user->level * 100) {
                $user->increment('level');
            }

            // Mark challenge as completed
            $userChallenge = UserChallenge::where('user_id', $user->id)
                ->where('challenge_id', $submission->challenge->id)
                ->first();
            
            if ($userChallenge) {
                $userChallenge->update([
                    'status' => 'termine',
                    'completed_at' => now(),
                ]);
            }

            // Create notification
            Notification::create([
                'user_id' => $user->id,
                'message' => "Félicitations! Votre soumission pour '{$submission->challenge->title}' a été validée. Vous avez gagné {$submission->challenge->points} points!",
            ]);
        }

        return $feedback;
    }

    // Get unread notifications
    public function unreadNotifications()
    {
        return $this->notifications()->unread()->get();
    }

    // Check if user can earn a specific badge
    public function canEarnBadge($badgeId)
    {
        $badge = Badge::find($badgeId);
        
        if (!$badge || $this->badges()->where('badge_id', $badgeId)->exists()) {
            return false;
        }

        return $this->points >= $badge->points_requis;
    }
}
