<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cote extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'nom_cours',
        'note',
    ];

    // Relation avec le modèle Etudiant
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}