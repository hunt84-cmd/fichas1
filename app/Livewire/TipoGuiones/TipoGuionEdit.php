<?php

namespace App\Livewire\TipoGuiones;

use App\Models\TipoGuion;
use LivewireUI\Modal\ModalComponent;

class TipoGuionEdit extends ModalComponent
{
	public $id, $nombre;

	protected $rules = [
		'nombre' => 'required|min:3',
	];

	public function mount($id)
	{
		$this->id = $id;
		$this->nombre = TipoGuion::findOrFail($id)->nombre;
	}

	public function render()
	{
		return view('livewire.tipoguiones.tipoguion-edit');
	}

	public function updatePost()
	{
		$this->validate();
		try {
			TipoGuion::whereId($this->id)->update([
				'nombre' => $this->nombre,
			]);
			flash()->success('Actualizado', [], 'Tipo Guion');
			$this->closeModal();
			$this->dispatch('refreshtipoguiones');
		} catch (\Exception $e) {
			flash()->danger('No se pudo actualizar', [], 'Tipo Guion');
		}
	}
}

