<?php

namespace App\Http\Livewire\Blog\Landding;

use App\Models\Teaching as ModelsTeaching;
use Livewire\Component;

class Teaching extends Component
{
    public $readyToLoad = false;
    public function loadTeachings()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        $teachings=ModelsTeaching::where('status',2)->orderBy('id', 'desc')
                                                    ->take(6)
                                                    ->get();
        return view('livewire.blog.landding.teaching',compact('teachings'));
    }
}
