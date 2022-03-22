<?php

namespace App\Http\Livewire\Blog;

use App\Models\Ministry;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchMinisteries extends Component
{
    public $search=null;

    public function render()
    {
        return view('livewire.blog.search-ministeries',[
        'ministeries' =>DB::table('ministries')->where("name", "like",'%'.$this->search."%")
                                ->where('status',2)->get()]);
    }
}
