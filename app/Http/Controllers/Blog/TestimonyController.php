<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TestimonyController extends Controller
{
    public function index(){
        return view('blog.testimony.index');
    }

    public function show($slug){   
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
       
        $testimony = Testimony::where('slug',$slug)->first();
        $this->authorize('publicado',$testimony); 
        $similares = Testimony::where('status',2)
                            ->where('id','!=',$testimony->id)
                            ->take(4)
                            ->latest('id')
                            ->get();

        return view('blog.testimony.show',compact('testimony','similares'));
    }
}
