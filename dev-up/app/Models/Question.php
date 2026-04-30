<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'challenge_id',
        'enonce',
        'points',
        'ordre',
        'temps_limite',
        'explication',
    ];

    protected $casts = [
        'temps_limite' => 'integer',
        'points' => 'integer',
        'ordre' => 'integer',
    ];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }

    public function verifierReponse(Reponse $reponse): bool
    {
        return $reponse->est_correcte;
    }

    public function getExplication(): string
    {
        return $this->explication;
    }
}
