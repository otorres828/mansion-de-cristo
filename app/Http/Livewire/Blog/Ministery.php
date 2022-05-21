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
    
    public function render()
    {
        $ministeries = Ministry::where('status',2)->orderBy('id','desc')->paginate(8);
        return view('livewire.blog.ministery',compact('ministeries'));
    }
}
