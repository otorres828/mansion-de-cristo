<?php

namespace App\Http\Livewire\Blog\Landding;

use App\Models\Announce;
use Livewire\Component;

class Notice extends Component
{
    public $readyToLoad = false;
 
    public function loadNotices()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        $notices=Announce::where('status',2)->take(8)->orderBy('id','desc')->get();
        return view('livewire.blog.landding.notice',compact('notices'));
    }
}
