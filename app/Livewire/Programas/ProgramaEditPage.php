<?php

namespace App\Livewire\Programas;

use App\Models\Emisora;
use App\Models\Funcion;
use App\Models\Programa;
use App\Models\TipoPrograma;
use Livewire\Component;

class ProgramaEditPage extends Component
{
	public $id, $habilitado, $nombre, $objetivo, $descripcion, $creacion, $origen, $dias, $porciento_musica, $inicio, $final, $emisora_id, $funcion_id, $tipo_id, $tema, $especificacion, $destinatario, $tiempo_aproximado, $vivo;

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

	public function mount($id)
	{
		$this->id = $id;
		$p = Programa::findOrFail($id);
		$this->habilitado = $p->habilitado;
		$this->nombre = $p->nombre;
		$this->objetivo = $p->objetivo;
		$this->descripcion = $p->descripcion;
		$this->creacion = $p->creacion;
		$this->origen = $p->origen;
		$this->dias = $p->dias;
		$this->porciento_musica = $p->porciento_musica;
		$this->inicio = $p->inicio;
		$this->final = $p->final;
		$this->emisora_id = $p->emisora_id;
		$this->funcion_id = $p->funcion_id;
		$this->tipo_id = $p->tipo_id;
		$this->tema = $p->tema;
		$this->especificacion = $p->especificacion;
		$this->destinatario = $p->destinatario;
		$this->tiempo_aproximado = $p->tiempo_aproximado;
		$this->vivo = $p->vivo;
	}

	public function render()
	{
		return view('livewire.programas.page-edit', [
			'emisoras' => Emisora::all(),
			'funciones' => Funcion::all(),
			'tipos' => TipoPrograma::all(),
		]);
	}

	public function save()
	{
		$this->validate();
		Programa::whereId($this->id)->update([
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
		flash()->success('Programa actualizado');
		return redirect()->route('programas');
	}
}

