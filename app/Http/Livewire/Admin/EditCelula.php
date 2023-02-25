<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class EditCelula extends Component
{
    public $celula,$descendientes,$dia;

    public function mount($celula,$descendientes){
        $this->celula=$celula;
        $this->descendientes=$descendientes;

        $this->dia=$celula->dia;
    }
    public function render()
    {
        return view('livewire.admin.edit-celula');
    }
}
