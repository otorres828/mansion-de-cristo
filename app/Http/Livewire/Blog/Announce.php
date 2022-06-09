<?php

namespace App\Http\Livewire\Blog;

use App\Models\Announce as ModelsAnnounce;
use App\Models\Testimony;
use Livewire\Component;
use Livewire\WithPagination;

class Announce extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $announces = ModelsAnnounce::where('status',2)->orderBy('id','desc')->paginate(8);
        $similares = Testimony::where('status',2)->orderBy('id','desc')->paginate(2);

        return view('livewire.blog.announce',compact('announces','similares'));
    }
}
