<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'post_nom',
        'prenom',
        'genre',
        'date_naissance',
        'matricule',
        'email',
        'password',
    ];

    // Relation avec le modèle Cote
    public function cotes()
    {
        return $this->hasMany(Cote::class);
    }
}