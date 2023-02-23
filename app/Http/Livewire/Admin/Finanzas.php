<?php

namespace App\Http\Livewire\Admin;

use App\Models\Red;
use App\Models\User;
use Livewire\Component;

class Finanzas extends Component
{
    public $selectedRed =null;
    public $redes,$usuarios;
    public function render()
    {
        $this->redes =  Red::where('temple_id', '=', auth()->user()->temple_id)->get();
        return view('livewire.admin.finanzas');
    }

    public function mount(){
        $this->usuarios=User::where('id','!=', auth()->user()->id)
        ->where('red_id','=',auth()->user()->red_id)->get();
    }
  
    public function updatedSelectedRed(){
        $this->usuarios=User::where('id', '!=', auth()->user()->id)
        ->where('red_id', '=', $this->selectedRed)->get();
    }
}
