<?php

namespace App\Http\Livewire\Blog;

use App\Models\Announce;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Eliminarimagen extends Component
{
    public $item;

    public function mount(Object $item){
        $this->item = $item;
    }

    public function eliminar(){
        if($this->item->image){
            Storage::disk('do_spaces')->delete($this->item->image->url);        
            $this->item->image()->delete();
        }  
    }
    public function render()
    {
        return view('livewire.blog.eliminarimagen');
    }
}
