<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Banned extends Component
{
    public $user,$status;
    public function mount(User $user){
        $this->user = $user;
        if($user->status ==1)
            $this->status='';
        else
            $this->status=$user->status;
    }

    public function status(){
        if($this->status==1){
            $this->user->status='2';
            $this->user->save();
            session()->flash('success', 'Se ha actualizado el acceso de '.$this->user->name. ', ahora puede ingresar');
        }else{
            $this->user->status='1';
            $this->user->save();
            session()->flash('danger', 'Se ha actualizado el acceso de '.$this->user->name. ', ahora no puede ingresar');
        
        }
    }

    public function render()
    {
        return view('livewire.admin.banned');
    }
}
