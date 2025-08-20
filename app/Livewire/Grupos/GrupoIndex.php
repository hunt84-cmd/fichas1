<?php

namespace App\Livewire\Grupos;

use App\Models\Grupo;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class GrupoIndex extends Component
{

    public $showModal = false;
    public $nombre = "";

    public function render()
    {

        return view('livewire.grupos.grupo-index');
    }

//    public function update()
//    {
//        $this->validate(
//            ['nombre'=>'required']
//        );
//        $grupo = Grupo::findorfail(1);
//        $grupo->nombre = $this->nombre;
//        $grupo->save();
//        session()->flash('message', 'Grupo creado');
//        $this->clean();
//        $this->dispatch('closeModal');
//        $this->redirect(GrupoIndex::class, navigate: true);
//
//    }
//    #[On('remove')]
//    public function remove($id)
//    {
//        dd($id);
//    }
    #[On('test')]
    public function test($id)
    {
        $this->nombre = $id;

    }
    #[On('refresh-the-component')]
    public function refreshTheComponent()
    {
        dd("aa");
    }
//    public function delete(Grupo $grupo)
//    {
//        $grupo->delete();
//        session()->flash('message', 'borrado');
//    }

}
