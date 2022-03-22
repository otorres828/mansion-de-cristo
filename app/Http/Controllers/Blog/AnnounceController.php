<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Announce;
use Illuminate\Support\Facades\Artisan;

class AnnounceController extends Controller
{
    
    public function index(){
        $announces = Announce::where('status',2)->orderBy('id','desc')->paginate(8);
        return view('blog.announce.index',compact('announces'));
    }

    public function show($slug){  
        $anuncio = Announce::where('slug',$slug)->first();
        $this->authorize('publicado',$anuncio); 
        $similares = Announce::where('status',2)
                            ->where('id','!=',$anuncio->id)
                            ->take(4)
                            ->latest('id')
                            ->get();
        return view('blog.announce.show',compact('anuncio','similares'));
    }

}
