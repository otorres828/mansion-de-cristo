<?php

namespace App\Http\Livewire\Admin;

use App\Models\Red;
use App\Models\User;
use Livewire\Component;

class Manager extends Component
{
    public $selectedManager=null;
    public $users;
    public function render()
    {
        $redes = Red::where('temple_id',auth()->user()->temple_id)->get();

        return view('livewire.admin.manager',compact('redes'));
    }

    public function updatedSelectedManager($id){
        $this->users = User::where('red_id',$id)->get();  
    }
}
