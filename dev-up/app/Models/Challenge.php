<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'difficulty',
        'points',
    ];

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
}
