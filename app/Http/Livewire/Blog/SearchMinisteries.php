<?php

namespace App\Http\Livewire\Blog;

use App\Models\Ministry;
use Livewire\Component;

class SearchMinisteries extends Component
{
    public $search=null;

    public function render()
    {
        return view('livewire.blog.search-ministeries',[
        'ministeries' =>Ministry::search($this->search)->where('status',2)->get()]);
    }
}
