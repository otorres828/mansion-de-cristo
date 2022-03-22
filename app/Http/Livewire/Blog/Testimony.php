<?php

namespace App\Http\Livewire\Blog;

use App\Models\Testimony as ModelsTestimony;
use Livewire\Component;
use Livewire\WithPagination;

class Testimony extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $testimonies = ModelsTestimony::where('status',2)->orderBy('id','desc')->paginate(6);
        return view('livewire.blog.testimony',compact('testimonies'));
    }
}
