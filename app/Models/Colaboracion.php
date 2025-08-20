<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colaboracion extends Model
{
    protected $table = "colaboraciones";
    protected $fillable = [
        'nombre',
        'minimo',
        'maximo',
    ];
}
