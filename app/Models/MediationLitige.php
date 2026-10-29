<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediationLitige extends Model
{
    protected $fillable = [
        'nature', 'dossiers', 'resolus', 'taux', 'tendance', 'tendance_niveau', 'ordre',
    ];
}
