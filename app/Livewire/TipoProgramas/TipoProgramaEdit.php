<?php

namespace App\Livewire\TipoProgramas;

use App\Models\Grupo;
use App\Models\TipoPrograma;
use LivewireUI\Modal\ModalComponent;

class TipoProgramaEdit extends ModalComponent
{
	public $id, $nombre, $categoria, $grupo_id;

	protected $rules = [
		'nombre' => 'required|min:3',
		'grupo_id' => 'required|exists:grupos,id',
		'categoria' => 'required',
	];

	public function mount($id)
	{
		$this->id = $id;
		$tp = TipoPrograma::findOrFail($id);
		$this->nombre = $tp->nombre;
		$this->categoria = $tp->categoria;
		$this->grupo_id = $tp->grupo_id;
	}

	public function render()
	{
		return view('livewire.tipoprog.tipoprog-edit', [
			'grupos' => Grupo::all(),
		]);
	}

	public function updatePost()
	{
		$this->validate();
		try {
			TipoPrograma::whereId($this->id)->update([
				'nombre' => $this->nombre,
				'grupo_id' => $this->grupo_id,
				'categoria' => $this->categoria,
			]);
			flash()->success('Actualizado', [], 'Tipo Programa');
			$this->closeModal();
			$this->dispatch('refreshtipoprog');
		} catch (\Exception $e) {
			flash()->danger('No se pudo actualizar', [], 'Tipo Programa');
		}
	}
}

