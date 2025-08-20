<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoGuion extends Model
{
    protected $table = "tipo_guiones";
    protected $fillable = [
        'nombre',
    ];
}
