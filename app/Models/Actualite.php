<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    protected $fillable = [
        'categorie', 'badge_label', 'badge_couleur', 'fond_couleur',
        'titre', 'contenu', 'date_publication', 'ordre',
    ];
}
