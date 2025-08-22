<?php

namespace App\Livewire\Emisoras;

use App\Models\Emisora;
use LivewireUI\Modal\ModalComponent;

class EmisoraEdit extends ModalComponent
{
	public $id, $nombre, $tipo_id, $periodo, $user_id, $insp_id;

	protected $rules = [
		'nombre' => 'required|min:3',
		'tipo_id' => 'required|exists:tipo_emisoras,id',
		'periodo' => 'required|date',
		'user_id' => 'required|exists:users,id',
		'insp_id' => 'nullable|exists:users,id',
	];

	protected $messages = [
		'nombre.required' => 'No puede estar en blanco.',
	];

	public function mount($id)
	{
		$this->id = $id;
		$e = Emisora::findOrFail($id);
		$this->nombre = $e->nombre;
		$this->tipo_id = $e->tipo_id;
		$this->periodo = $e->periodo;
		$this->user_id = $e->user_id;
		$this->insp_id = $e->insp_id;
	}

	public function render()
	{
		return view('livewire.emisoras.emisora-edit');
	}

	public function resetFields()
	{
		$this->nombre = '';
		$this->tipo_id = '';
		$this->periodo = '';
		$this->user_id = '';
		$this->insp_id = '';
		$this->id = '';
	}

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	public function updatePost()
	{
		$this->validate();
		try {
			Emisora::whereId($this->id)->update([
				'nombre' => $this->nombre,
				'tipo_id' => $this->tipo_id,
				'periodo' => $this->periodo,
				'user_id' => $this->user_id,
				'insp_id' => $this->insp_id,
			]);
			flash()->success('Se actualizó correctamente', [], 'Emisora');
			$this->resetFields();
			$this->closeModal();
			$this->dispatch('refreshemisoras');
		} catch (\Exception $ex) {
			flash()->danger('No se pudo actualizar.', [], 'Emisora');
		}
	}
}

