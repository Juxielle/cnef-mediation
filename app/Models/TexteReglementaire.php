<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TexteReglementaire extends Model
{
    protected $fillable = [
        'categorie', 'type', 'reference', 'titre', 'description',
        'date_publication', 'fichier', 'ordre',
    ];
}
