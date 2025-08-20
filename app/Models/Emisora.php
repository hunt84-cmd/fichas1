<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emisora extends Model
{
    protected $table = "emisoras";
    protected $fillable = [
        'nombre',
        'periodo',
        'user_id',
        'insp_id',
        'tipo_id',
    ];
}
