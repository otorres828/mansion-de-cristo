<?php

namespace App\Http\Livewire\Blog;

use App\Models\Announce;
use Livewire\Component;

class SearchAnnounces extends Component
{
    public $search=null;

    public function render(){
        return view('livewire.blog.search-announces',[
        'announces' => Announce::search($this->search)->where('status',2)->get()]);
    }
}
