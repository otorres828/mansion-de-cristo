<?php

namespace App\Http\Livewire\Blog\Landding;

use App\Models\Testimony as ModelsTestimony;
use Livewire\Component;

class Testimony extends Component
{
    public $readyToLoad = false;
    public function loadTestimonies()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        $testimonies=ModelsTestimony::where('status',2) ->orderBy('id', 'desc')
        ->take(6)
        ->get();
        return view('livewire.blog.landding.testimony',compact('testimonies'));
    }
}
