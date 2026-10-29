<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediationKpi extends Model
{
    protected $fillable = ['libelle', 'valeur', 'sous_texte', 'ordre'];
}
