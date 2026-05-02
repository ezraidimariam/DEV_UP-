<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'nom',
        'description',
    ];

    public function challenges()
    {
        return $this->hasMany(Challenge::class);
    }
}
