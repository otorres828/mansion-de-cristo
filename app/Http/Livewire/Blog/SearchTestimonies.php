<?php

namespace App\Http\Livewire\Blog;

use App\Models\Testimony;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchTestimonies extends Component
{
    public $search=null;

    public function render()
    {
        return view('livewire.blog.search-testimonies',[
        'testimonies' => DB::table('testimonies')->where("name", "like",'%'.$this->search."%")
                                ->where('status',2)->get()]);
    }

}
