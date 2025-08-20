<?php

namespace App\Livewire\Funciones;

use App\Models\Funcion;
use App\Models\Grupo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class FuncionesEdit extends ModalComponent
{

    public $nombre,$id;
    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'nombre' => 'required|min:6',

    ];

    protected $messages = [
        'nombre.required' => 'No puede estar en blanco.',

    ];

    public function mount($id)
    {
        $this->id = $id;
        $this->nombre = Funcion::findorfail($id)->nombre;
    }

    public function render()
    {
        return view('livewire.funciones.funciones-edit');
    }
    public function resetFields(){
        $this->nombre = '';
        $this->id= '';

    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function updatePost()
    {
        $this->validate();
        try {
            Funcion::whereId($this->id)->update([
                'nombre' => $this->nombre,
            ]);
            flash()->success('Se actualizo correctamente',[],'Funcion');
            $this->resetFields();
            $this->closeModal();
            $this->dispatch('refreshfunciones');
        } catch (\Exception $ex) {
            flash()->danger('No se pudo actualizar.',[],'Funcion');

        }
    }
}
