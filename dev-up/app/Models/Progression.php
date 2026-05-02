<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progression extends Model
{
    protected $fillable = [
        'apprenant_id',
        'challenge_id',
        'statut',
        'score',
        'date_debut',
        'date_completion',
    ];

    protected $casts = [
        'score' => 'integer',
        'date_debut' => 'datetime',
        'date_completion' => 'datetime',
    ];

    public function apprenant()
    {
        return $this->belongsTo(User::class, 'apprenant_id');
    }

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }
}
