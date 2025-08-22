<?php

namespace App\Livewire\TipoProgramas;

use App\Models\Grupo;
use App\Models\TipoPrograma;
use LivewireUI\Modal\ModalComponent;

class TipoProgramaCreate extends ModalComponent
{
	public $nombre, $categoria, $grupo_id;

	protected $rules = [
		'nombre' => 'required|min:3',
		'grupo_id' => 'required|exists:grupos,id',
		'categoria' => 'required',
	];

	public function render()
	{
		return view('livewire.tipoprog.tipoprog-create', [
			'grupos' => Grupo::all(),
		]);
	}

	public function updatePost()
	{
		$this->validate();
		try {
			TipoPrograma::create([
				'nombre' => $this->nombre,
				'grupo_id' => $this->grupo_id,
				'categoria' => $this->categoria,
			]);
			flash()->success('Creado', [], 'Tipo Programa');
			$this->reset(['nombre','categoria','grupo_id']);
			$this->closeModal();
			$this->dispatch('refreshtipoprog');
		} catch (\Exception $e) {
			flash()->danger('No se pudo crear', [], 'Tipo Programa');
		}
	}
}

