<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $table = "clasificaciones";
    protected $fillable = [
        'nombre',
        'tipo_guion_id',
    ];
    public function tipo_guion()
    {
        return $this->hasOne('App\Models\TipoGuion', 'id', 'tipo_guion_id');
    }
}
