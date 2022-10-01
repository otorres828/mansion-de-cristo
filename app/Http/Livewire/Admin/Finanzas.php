<?php

namespace App\Http\Livewire\Admin;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;

class Finanzas extends Component
{
    public $selectedRed =null;
    public $redes;
    public function render()
    {
        $this->redes =  Group::where('temple_id', '=', auth()->user()->temple_id)->get();
        return view('livewire.admin.finanzas');
    }

    public function mount(){
        $this->usuarios=User::where('id','!=', auth()->user()->id)
        ->where('group_id','=',auth()->user()->group_id)->get();
    }
  
    public function updatedSelectedRed(){
        $this->usuarios=User::where('id', '!=', auth()->user()->id)
        ->where('group_id', '=', $this->selectedRed)->get();
    }
}
