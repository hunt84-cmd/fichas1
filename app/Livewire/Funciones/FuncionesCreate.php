<?php

namespace App\Livewire\Funciones;

use App\Models\Funcion;
use App\Models\Grupo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class FuncionesCreate extends ModalComponent
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
        return view('livewire.funciones.funciones-create');
    }
    public function updatePost()
    {
        $this->validate();
        try {
            $grupo = new Funcion();
            $grupo->nombre = $this->nombre;
            $grupo->save();

            flash()->success('Creado correctamente',[],'Funcion');
            $this->resetFields();
            $this->closeModal();
            $this->dispatch('refreshfunciones');

        } catch (\Exception $ex) {
            flash()->danger('No se pudo crear.',[],'Funcion');

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
