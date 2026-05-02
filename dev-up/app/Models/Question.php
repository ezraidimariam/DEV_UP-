<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
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
}
