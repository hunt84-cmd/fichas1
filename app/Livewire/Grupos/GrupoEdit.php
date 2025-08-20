<?php

namespace App\Livewire\Grupos;

use App\Models\Grupo;
use Carbon\Exceptions\BadFluentSetterException;
use Livewire\Attributes\On;
use Livewire\Component;
use Flux\Flux;
use LivewireUI\Modal\ModalComponent;

class GrupoEdit extends ModalComponent
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
        $this->nombre = Grupo::findorfail($id)->nombre;
    }

    public function render()
    {
        return view('livewire.grupos.grupo-edit');
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
      public function updatePost()
    {
        $this->validate();
        try {
            Grupo::whereId($this->id)->update([
                'nombre' => $this->nombre,
            ]);
            flash()->success('Se actualizo correctamente',[],'Grupo');
            $this->resetFields();
            $this->closeModal();
            $this->dispatch('refreshgrupos');
        } catch (\Exception $ex) {
            flash()->danger('No se pudo actualizar.',[],'Grupo');

        }
    }

}
