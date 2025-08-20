<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emisora extends Model
{
    protected $table = "emisoras";
    protected $fillable = [
        'nombre',
    ];
}
