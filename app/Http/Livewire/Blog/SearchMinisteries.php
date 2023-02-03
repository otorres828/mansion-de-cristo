<?php

namespace App\Http\Livewire\Blog;

use App\Models\Ministry;
use Livewire\Component;

class SearchMinisteries extends Component
{
    public $search=null;

    public function render()
    {
        $ministerios=Ministry::search($this->search)->where('status',2)->get();
        $h =0;
        if ($ministerios->count() == 1) $h=11;
        else if($ministerios->count() == 2) $h=22; 
        elseif($ministerios->count() == 3) $h=33;
        elseif($ministerios->count() > 3) $h=34; 
        return view('livewire.blog.search-ministeries',[
        'ministeries' =>$ministerios,'h'=>$h]);
    }
}
