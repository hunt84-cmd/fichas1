<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPrograma extends Model
{
    protected $fillable = [
        'nombre',
        'categoria'
    ];

    public function grupo()
    {
        return $this->hasOne('App\Models\Grupo', 'id', 'grupo_id');
    }
}
