<?php

namespace App\Http\Livewire\Panel;

use App\Models\Note;
use Livewire\Component;
use Livewire\WithPagination;

class Todolist extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name,$user_id;
    public $estatus;

    public function render(){
        $lists = Note::where('user_id',auth()->user()->id)
                        ->paginate(5);
        return view('livewire.panel.todolist',compact('lists'));
    }

    public function store(){
        $this->validate(['name'=>'required']);
        Note::create([
            'name'=>$this->name,
            'user_id'=>auth()->user()->id,
            'status'=>1
        ]);
        $this->name="";
    }
    public function status($id){
       $note=Note::find($id);
       if($note->status==1)
       $note->status=2;
       else
       $note->status=1;
       $note->save();

    }

    public function delete($id){
        Note::destroy($id);
    }

}
