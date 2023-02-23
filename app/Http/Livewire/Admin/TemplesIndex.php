<?php

namespace App\Http\Livewire\Admin;

use App\Models\Temple;
use app\Models\Red;
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
    public $redes,$jerarquias,$users;

    public function render() {
        $temples = Temple::all();
        return view('livewire.admin.temples-index',compact('temples'));
    }

    public function updatedSelectedtemple($temple_id){
        $this->count = Hierarchy::all()->count();
        $this->jerarquias = Hierarchy::where('temple_id',$temple_id)
                                    ->where('nivel','!=','0')
                                    ->where('nivel','<',$this->count-1)
                                    ->get();
        $this->groups = Red::where('temple_id',$temple_id)->get();
        
    }

    public function updatedSelectedGroup($red_id){
        
        $this->users = User::where('red_id',$red_id)->
                            where('jerarquia_id','<',$this->selectedHierarchy)->get();
    }
    
}
