<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class HelloWorld extends ModalComponent
{
    public $nombre = "pepe";
    public function mount($id)
    {
      $this->nombre =  $id;
    }
    public function render()
    {
        return view('livewire.hello-world');
    }
}
