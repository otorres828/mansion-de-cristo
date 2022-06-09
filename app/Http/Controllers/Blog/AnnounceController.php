<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Announce;
use App\Models\Testimony;
use App\Models\Visitas;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

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

        $fecha = date("Y-m-d");
        $ip = $_SERVER["REMOTE_ADDR"] ?? "";
        $url=route('blog.show_announces',$anuncio);
        DB::select("INSERT INTO visitas(fecha, ip, pagina, url) 
                    VALUES('$fecha', '$ip', '$anuncio->name', '$url')");

        return view('blog.announce.show',compact('anuncio','similares'));
    }

}
