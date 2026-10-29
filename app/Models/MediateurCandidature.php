<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediateurCandidature extends Model
{
    protected $fillable = [
        'prenom', 'nom', 'email', 'telephone', 'branche',
        'lettre_motivation', 'pieces_jointes', 'statut',
    ];

    protected $casts = [
        'pieces_jointes' => 'array',
    ];
}
