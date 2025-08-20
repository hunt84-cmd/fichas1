<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TasaGuion extends Model
{
    protected $table = "tasa_guiones";
    protected $fillable = [
        'tiempo',
        'minimo',
        'maximo',
        'clasificacion_id',
    ];
}
