<?php

namespace App\Livewire\TipoGuiones;

use App\Models\TipoGuion;
use LivewireUI\Modal\ModalComponent;

class TipoGuionCreate extends ModalComponent
{
	public $nombre;

	protected $rules = [
		'nombre' => 'required|min:3',
	];

	public function render()
	{
		return view('livewire.tipoguiones.tipoguion-create');
	}

	public function updatePost()
	{
		$this->validate();
		try {
			$tipo = new TipoGuion();
			$tipo->nombre = $this->nombre;
			$tipo->save();
			flash()->success('Creado', [], 'Tipo Guion');
			$this->reset(['nombre']);
			$this->closeModal();
			$this->dispatch('refreshtipoguiones');
		} catch (\Exception $e) {
			flash()->danger('No se pudo crear', [], 'Tipo Guion');
		}
	}
}

