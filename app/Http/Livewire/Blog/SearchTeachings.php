<?php

namespace App\Http\Livewire\Blog;

use App\Models\Teaching;
use Livewire\Component;

class SearchTeachings extends Component
{
    public $search=null;

    public function render()
    {
        return view('livewire.blog.search-teachings',[
        'teachings' => Teaching::search($this->search)->where('status',2)->get()]);
    }
}