<?php

namespace App\Http\Livewire\Blog;

use App\Models\Teaching;
use Livewire\Component;

class SearchTeachings extends Component
{
    public $search=null;

    public function render()
    {
        $teachings= Teaching::search($this->search)->where('status',2)->get();
        $h =0;
        if ($teachings->count() == 1) $h=11;
        else if($teachings->count() == 2) $h=22; 
        elseif($teachings->count() == 3) $h=33;
        elseif($teachings->count() > 3) $h=40; 

        return view('livewire.blog.search-teachings',[
        'teachings' => $teachings,'h'=>$h]);
    }
}