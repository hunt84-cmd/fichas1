<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grupo extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function tipos(): HasMany
    {
        return $this->hasMany(TipoPrograma::class);
    }
}
