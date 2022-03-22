<?php

namespace App\Http\Livewire\Blog;

use App\Models\Announce;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        $announces = Announce::where('status',2)
        ->orderBy('id','desc')
        ->take(4)
        ->get();
        return view('livewire.blog.sidebar',compact('announces'));
    }
}
