<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $fillable = [
        'question_id',
        'apprenant_id',
        'contenu',
        'est_correcte',
        'temps_reponse',
        'tentative_numero',
    ];

    protected $casts = [
        'est_correcte' => 'boolean',
        'temps_reponse' => 'integer',
        'tentative_numero' => 'integer',
        'date_soumission' => 'datetime',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function apprenant()
    {
        return $this->belongsTo(User::class, 'apprenant_id');
    }
}
