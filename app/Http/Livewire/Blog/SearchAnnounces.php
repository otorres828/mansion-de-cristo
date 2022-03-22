<?php

namespace App\Http\Livewire\Blog;

use App\Models\Announce;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchAnnounces extends Component
{
    public $search=null;

    public function render(){
        return view('livewire.blog.search-announces',[
        'announces' => DB::table('announces')->where("name", "like",'%'.$this->search."%")
                                ->where('status',2)->get()]);
    }
}
