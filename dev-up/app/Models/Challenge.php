<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'titre',
        'description',
        'difficulte',
        'valeur_points',
        'date_limite',
    ];

    protected $casts = [
        'date_limite' => 'datetime',
        'valeur_points' => 'integer',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function userChallenges()
    {
        return $this->hasMany(UserChallenge::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_challenges');
    }

    public function progressions()
    {
        return $this->hasMany(Progression::class);
    }

    public function getQuestions(): array
    {
        return $this->questions()->get()->toArray();
    }

    public function estActif(): bool
    {
        return $this->date_limite && $this->date_limite > now();
    }
}
