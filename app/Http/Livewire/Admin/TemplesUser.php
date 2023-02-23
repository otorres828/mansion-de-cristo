<?php

namespace App\Http\Livewire\Admin;

use app\Models\Red;
use App\Models\Jerarquia;
use App\Models\Temple;
use App\Models\User;
use Livewire\Component;

class TemplesUser extends Component
{
    public $selectedHierarchy=null;
    public $selectedGroup =null;
    public $selectedUser=null;
    public $count;
    public $redes,$jerarquias,$users,$master=null,$level=null;

    public function render()  {
        $user = User:: find(auth()->user()->id);  
        $temple = Temple::find($user->temple_id);
        $this->jerarquias = Jerarquia::where('temple_id',$user->temple_id)
                                ->where('nivel','>',$user->jerarquia->nivel)
                                ->get();

        $nivel= Jerarquia::where('temple_id',$user->temple_id)->first();

        return view('livewire.admin.temples-user',compact('temple'));
    }

    public function updatedSelectedHierarchy($jerarquia_id){
        $user = User:: find(auth()->user()->id); 
        $this->level=Jerarquia::find($jerarquia_id)->nivel;
 
        if($user->jerarquia->nivel >0)  
            $this->redes = Red::where('id',$user->red_id)
                            ->get();
        else{
            $this->master=$user;
            $this->redes = Red::where('temple_id',$user->temple_id)->get();
        }
    }

    public function updatedSelectedGroup($red_id){
        // $this->users = User:: where('red_id',$red_id)
        //                     ->where('jerarquia_id','<',$this->selectedHierarchy)
        //                     ->get();

        $this->users = User:: find(auth()->user()->id)->descendantsAndSelf;             
    }

}



