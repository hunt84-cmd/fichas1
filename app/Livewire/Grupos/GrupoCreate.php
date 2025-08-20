<?php

namespace App\Livewire\Grupos;

use App\Models\Grupo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class GrupoCreate extends  ModalComponent
{
    public $nombre;

    protected $rules = [
        'nombre' => 'required|min:6',

    ];

    protected $messages = [
        'nombre.required' => 'No puede estar en blanco.',

    ];

    public function render()
    {
        return view('livewire.grupos.grupo-create');
    }

    public function updatePost()
    {
        $this->validate();
        try {
            $grupo = new Grupo();
            $grupo->nombre = $this->nombre;
            $grupo->save();

            flash()->success('creado correctamente',[],'Grupo');
            $this->resetFields();
            $this->closeModal();
            $this->dispatch('refreshgrupos');

        } catch (\Exception $ex) {
            flash()->danger('No se pudo crear.',[],'Grupo');

        }
    }
    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields(){
        $this->nombre = '';
        $this->id= '';

    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
