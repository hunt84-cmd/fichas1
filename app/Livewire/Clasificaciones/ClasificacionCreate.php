<?php

namespace App\Livewire\Clasificaciones;

use App\Models\Clasificacion;
use App\Models\TipoGuion;
use LivewireUI\Modal\ModalComponent;

class ClasificacionCreate extends ModalComponent
{
	public $nombre, $tipo_guion_id;

	protected $rules = [
		'nombre' => 'required|min:3',
		'tipo_guion_id' => 'required|exists:tipo_guiones,id',
	];

	public function render()
	{
		return view('livewire.clasificaciones.clasificacion-create', [
			'tipos' => TipoGuion::all(),
		]);
	}

	public function updatePost()
	{
		$this->validate();
		try {
			Clasificacion::create([
				'nombre' => $this->nombre,
				'tipo_guion_id' => $this->tipo_guion_id,
			]);
			flash()->success('Creado', [], 'Clasificación');
			$this->reset(['nombre','tipo_guion_id']);
			$this->closeModal();
			$this->dispatch('refreshclasificaciones');
		} catch (\Exception $e) {
			flash()->danger('No se pudo crear', [], 'Clasificación');
		}
	}
}

