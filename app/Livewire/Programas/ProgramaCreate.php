<?php

namespace App\Livewire\Programas;

use App\Models\Emisora;
use App\Models\Funcion;
use App\Models\Programa;
use App\Models\TipoPrograma;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class ProgramaCreate extends ModalComponent
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
		return view('livewire.programas.programa-create', [
			'emisoras' => Emisora::all(),
			'funciones' => Funcion::all(),
			'tipos' => TipoPrograma::all(),
		]);
	}

	public function updatePost()
	{
		$this->validate();
		try {
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
			flash()->success('Creado', [], 'Programa');
			$this->closeModal();
			$this->dispatch('refreshprogramas');
		} catch (\Exception $e) {
			flash()->danger('No se pudo crear', [], 'Programa');
		}
	}
}

