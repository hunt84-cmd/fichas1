<?php

namespace App\Livewire\Emisoras;

use App\Models\Emisora;
use LivewireUI\Modal\ModalComponent;

class EmisoraCreate extends ModalComponent
{
	public $nombre, $tipo_id, $periodo, $user_id, $insp_id;

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

	public function render()
	{
		return view('livewire.emisoras.emisora-create');
	}

	public function updatePost()
	{
		$this->validate();
		try {
			$emisora = new Emisora();
			$emisora->nombre = $this->nombre;
			$emisora->tipo_id = $this->tipo_id;
			$emisora->periodo = $this->periodo;
			$emisora->user_id = $this->user_id;
			$emisora->insp_id = $this->insp_id;
			$emisora->save();

			flash()->success('Creado correctamente', [], 'Emisora');
			$this->resetFields();
			$this->closeModal();
			$this->dispatch('refreshemisoras');
		} catch (\Exception $ex) {
			flash()->danger('No se pudo crear.', [], 'Emisora');
		}
	}

	public function resetFields()
	{
		$this->nombre = '';
		$this->tipo_id = '';
		$this->periodo = '';
		$this->user_id = '';
		$this->insp_id = '';
	}

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}
}

