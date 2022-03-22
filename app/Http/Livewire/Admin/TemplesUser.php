<?php

namespace App\Http\Livewire\Admin;

use App\Models\Group;
use App\Models\Hierarchy;
use App\Models\Temple;
use App\Models\User;
use Livewire\Component;

class TemplesUser extends Component
{
    public $selectedHierarchy=null;
    public $selectedGroup =null;
    public $selectedUser=null;
    public $count;
    public $groups,$hierarchies,$users,$master=null,$level=null;

    public function render()  {
        $user = User:: find(auth()->user()->id);  
        $temple = Temple::find($user->temple_id);
        $this->hierarchies = Hierarchy::where('temple_id',$user->temple_id)
                                ->where('nivel','>',$user->hierarchy->nivel)
                                ->get();

        $nivel= Hierarchy::where('temple_id',$user->temple_id)->first();

        return view('livewire.admin.temples-user',compact('temple'));
    }

    public function updatedSelectedHierarchy($hierarchy_id){
        $user = User:: find(auth()->user()->id); 
        $this->level=Hierarchy::find($hierarchy_id)->nivel;
 
        if($user->hierarchy->nivel >0)  
            $this->groups = Group::where('id',$user->group_id)
                            ->get();
        else{
            $this->master=$user;
            $this->groups = Group::where('temple_id',$user->temple_id)->get();
        }
    }

    public function updatedSelectedGroup($group_id){
        // $this->users = User:: where('group_id',$group_id)
        //                     ->where('hierarchy_id','<',$this->selectedHierarchy)
        //                     ->get();

        $this->users = User:: find(auth()->user()->id)->descendantsAndSelf;             
    }

}



