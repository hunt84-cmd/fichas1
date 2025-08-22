<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $fillable = [
        'habilitado',
        'nombre',
        'objetivo',
        'descripcion',
        'creacion',
        'origen',
        'dias',
        'porciento_musica',
        'inicio',
        'final',
        'emisora_id',
        'funcion_id',
        'tipo_id',
        'tema',
        'especificacion',
        'destinatario',
        'tiempo_aproximado',
        'vivo',
    ];
    protected $casts = [
        'porciento_musica' => 'array',
        'dias' => 'array',
        'tiempo_aproximado' => 'array',
    ];

    public function emisora()
    {
        return $this->hasOne('App\Models\Emisora', 'id', 'emisora_id');
    }
    public function funcion()
    {
        return $this->hasOne('App\Models\Funcion', 'id', 'funcion_id');
    }
    public function tipo_programa()
    {
        return $this->hasOne('App\Models\TipoPrograma', 'id', 'tipo_id');
    }
}
