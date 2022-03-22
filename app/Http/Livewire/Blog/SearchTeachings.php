<?php

namespace App\Http\Livewire\Blog;

use App\Models\Teaching;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchTeachings extends Component
{
    public $search=null;

    public function render()
    {
        return view('livewire.blog.search-teachings',[
        'teachings' => DB::table('teachings')->where("name", "like",'%'.$this->search."%")
                                ->where('status',2)->get()]);
    }
}