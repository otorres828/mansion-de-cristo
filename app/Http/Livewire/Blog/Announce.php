<?php

namespace App\Http\Livewire\Blog;

use App\Models\Announce as ModelsAnnounce;
use Livewire\Component;
use Livewire\WithPagination;

class Announce extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $announces = ModelsAnnounce::where('status',2)->orderBy('id','desc')->paginate(8);
        return view('livewire.blog.announce',compact('announces'));
    }
}
