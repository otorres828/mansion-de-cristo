<?php

namespace App\Http\Livewire\Admin;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;

class Manager extends Component
{
    public $selectedManager=null;
    public $users;
    public function render()
    {
        $groups = Group::where('temple_id',auth()->user()->temple_id)->get();

        return view('livewire.admin.manager',compact('groups'));
    }

    public function updatedSelectedManager($id){
        $this->users = User::where('group_id',$id)->get();  
    }
}
