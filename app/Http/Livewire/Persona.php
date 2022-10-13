<?php

namespace App\Http\Livewire;

use App\Models\Personas;
use Livewire\Component;

class Persona extends Component
{

    
    public $seleccionado='';
    public $persona;

    public function mount(){
        $this->Personas=[];
    }

    public function render()
    {
    
    }
}
