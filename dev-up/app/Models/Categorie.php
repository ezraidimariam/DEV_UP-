<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
    ];

    public function challenges()
    {
        return $this->hasMany(Challenge::class);
    }

    public function getChallenges(): array
    {
        return $this->challenges()->get()->toArray();
    }
}
