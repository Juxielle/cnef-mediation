<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediationSaisineTrimestre extends Model
{
    protected $fillable = ['periode', 'saisines', 'resolus', 'ordre'];
}
