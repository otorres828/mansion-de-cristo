<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Models\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MinisteryController extends Controller
{
    public function index(){
        return view('blog.ministery.index');
    }

    public function show($slug){
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
          
        $ministery = Ministry::where('slug',$slug)->first();
        $this->authorize('publicado',$ministery); 
        $similares = Ministry::where('status',2)
                            ->where('id','!=',$ministery->id)
                            ->take(4)
                            ->latest('id')
                            ->get();

        return view('blog.ministery.show',compact('ministery','similares'));
    }
}
