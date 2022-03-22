<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Blog\Testimony;
use App\Models\Teaching;
use App\Models\Testimony as ModelsTestimony;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function teaching(Request $request){
        $term = $request->get('term');
        $querys = Teaching::where('name','LIKE','%'.$term.'%')
                        ->where('status',2)
                        ->get();

        $data = [];

        foreach($querys as $query){
            $data[]= [
                'label'=> $query->name
            ];        
        }
        return $data;

    }

    public function testimony(Request $request){
        $term = $request->get('term');
        $querys = ModelsTestimony::where('name','LIKE','%'.$term.'%')
                        ->where('status',2)
                        ->get();

        $data = [];

        foreach($querys as $query){
            $data[]= [
                'label'=> $query->name
            ];        
        }
        return $data;

    }
}
