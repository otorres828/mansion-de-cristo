<?php

namespace App\Http\Livewire\Blog;

use App\Models\Ministry;
use Livewire\Component;
use Livewire\WithPagination;

class Ministery extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $abrir=false;
    public $tipo="todos";

    public function render()
    {
        if($this->tipo=='todos'){
            $ministeries = Ministry::where('status',2)->orderBy('id','desc')->paginate(8);
        }else if($this->tipo=='1'){
            $ministeries = Ministry::where('status',2)->where('type',1)->orderBy('id','desc')->paginate(8);
        }else{
            $ministeries = Ministry::where('status',2)->where('type',2)->orderBy('id','desc')->paginate(8);
        }
        return view('livewire.blog.ministery',compact('ministeries'));
    }

    public function updatingTipo()
    {
        $this->resetPage();
    }

    public function filtro($tipo){
        $this->tipo=$tipo;
        $this->resetPage();
    }
}
