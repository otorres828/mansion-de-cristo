<?php

namespace App\Http\Livewire\Admin;

use App\Models\Temple;
use App\Models\Group;
use App\Models\Hierarchy;
use App\Models\User;
use Livewire\Component;

class TemplesIndex extends Component
{
    public $selectedTemple = null;
    public $selectedGroup =null;
    public $selectedHierarchy=null;
    public $selectedUser=null;
    public $count;
    public $groups,$hierarchies,$users;

    public function render() {
        $temples = Temple::all();
        return view('livewire.admin.temples-index',compact('temples'));
    }

    public function updatedSelectedtemple($temple_id){
        $this->count = Hierarchy::all()->count();
        $this->hierarchies = Hierarchy::where('temple_id',$temple_id)
                                    ->where('nivel','!=','0')
                                    ->where('nivel','<',$this->count-1)
                                    ->get();
        $this->groups = Group::where('temple_id',$temple_id)->get();
        
    }

    public function updatedSelectedGroup($group_id){
        
        $this->users = User::where('group_id',$group_id)->
                            where('hierarchy_id','<',$this->selectedHierarchy)->get();
    }
    
}
