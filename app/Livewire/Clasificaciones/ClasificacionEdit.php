<?php

namespace App\Livewire\Clasificaciones;

use App\Models\Clasificacion;
use App\Models\TipoGuion;
use LivewireUI\Modal\ModalComponent;

class ClasificacionEdit extends ModalComponent
{
	public $id, $nombre, $tipo_guion_id;

	protected $rules = [
		'nombre' => 'required|min:3',
		'tipo_guion_id' => 'required|exists:tipo_guiones,id',
	];

	public function mount($id)
	{
		$this->id = $id;
		$c = Clasificacion::findOrFail($id);
		$this->nombre = $c->nombre;
		$this->tipo_guion_id = $c->tipo_guion_id;
	}

	public function render()
	{
		return view('livewire.clasificaciones.clasificacion-edit', [
			'tipos' => TipoGuion::all(),
		]);
	}

	public function updatePost()
	{
		$this->validate();
		try {
			Clasificacion::whereId($this->id)->update([
				'nombre' => $this->nombre,
				'tipo_guion_id' => $this->tipo_guion_id,
			]);
			flash()->success('Actualizado', [], 'Clasificación');
			$this->closeModal();
			$this->dispatch('refreshclasificaciones');
		} catch (\Exception $e) {
			flash()->danger('No se pudo actualizar', [], 'Clasificación');
		}
	}
}

