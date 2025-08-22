<?php

namespace App\Livewire\Programas;

use App\Models\Emisora;
use App\Models\Funcion;
use App\Models\Programa;
use App\Models\TipoPrograma;
use Livewire\Component;

class ProgramaCreatePage extends Component
{
	public $habilitado = true;
	public $nombre, $objetivo, $descripcion, $creacion, $origen = true, $dias = [], $porciento_musica = [0,0], $inicio, $final, $emisora_id, $funcion_id, $tipo_id, $tema, $especificacion, $destinatario, $tiempo_aproximado = [], $vivo = false;

	protected $rules = [
		'nombre' => 'required|min:3',
		'objetivo' => 'required',
		'descripcion' => 'required',
		'creacion' => 'required|date',
		'origen' => 'required|boolean',
		'dias' => 'required|array|min:1',
		'porciento_musica' => 'required|array|size:2',
		'inicio' => 'required',
		'final' => 'required',
		'emisora_id' => 'required|exists:emisoras,id',
		'funcion_id' => 'required|exists:funciones,id',
		'tipo_id' => 'required|exists:tipo_programas,id',
		'tema' => 'required',
		'especificacion' => 'required',
		'destinatario' => 'required',
		'tiempo_aproximado' => 'required|array',
		'vivo' => 'required|boolean',
	];

	public function render()
	{
		return view('livewire.programas.page-create', [
			'emisoras' => Emisora::all(),
			'funciones' => Funcion::all(),
			'tipos' => TipoPrograma::all(),
		]);
	}

	public function save()
	{
		$this->validate();
		Programa::create([
			'habilitado' => $this->habilitado,
			'nombre' => $this->nombre,
			'objetivo' => $this->objetivo,
			'descripcion' => $this->descripcion,
			'creacion' => $this->creacion,
			'origen' => $this->origen,
			'dias' => $this->dias,
			'porciento_musica' => $this->porciento_musica,
			'inicio' => $this->inicio,
			'final' => $this->final,
			'emisora_id' => $this->emisora_id,
			'funcion_id' => $this->funcion_id,
			'tipo_id' => $this->tipo_id,
			'tema' => $this->tema,
			'especificacion' => $this->especificacion,
			'destinatario' => $this->destinatario,
			'tiempo_aproximado' => $this->tiempo_aproximado,
			'vivo' => $this->vivo,
		]);
		flash()->success('Programa creado');
		return redirect()->route('programas');
	}
}

