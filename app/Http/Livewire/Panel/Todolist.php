<?php

namespace App\Http\Livewire\Panel;

use App\Models\Note;
use Livewire\Component;
use Livewire\WithPagination;

class Todolist extends Component
{
    public $name,$user_id;
    public $estatus;

    public function render(){
        $lists = Note::where('user_id',auth()->user()->id)
                        ->paginate(8);
        return view('livewire.panel.todolist',compact('lists'));
    }

    public function store(){
        $this->validate(['name'=>'required']);
        Note::create([
            'name'=>$this->name,
            'user_id'=>auth()->user()->id
        ]);
    }
    public function status(){
       
    }

   
}
