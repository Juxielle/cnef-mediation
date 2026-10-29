<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediationEtablissement extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie',
        'nom',
        'sigle',
        'actif',
        'ordre',
    ];

    protected $casts = [
        'actif' => 'boolean',
        'ordre' => 'integer',
    ];
}
