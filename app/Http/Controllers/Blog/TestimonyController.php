<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class TestimonyController extends Controller
{
    public function index(){
        return view('blog.testimony.index');
    }

    public function show($slug){        
        $testimony = Testimony::where('slug',$slug)->first();
        $this->authorize('publicado',$testimony); 
        $similares = Testimony::where('status',2)
                            ->where('id','!=',$testimony->id)
                            ->take(8)
                            ->latest('id')
                            ->get();
                            
        $fecha = date("Y-m-d");
        $ip = $_SERVER["REMOTE_ADDR"] ?? "";
        $url=route('blog.show_testimony',$testimony);
        DB::select("INSERT INTO visitas(fecha, ip, pagina, url) 
                   VALUES('$fecha', '$ip', '$testimony->name', '$url')");

        return view('blog.testimony.show',compact('testimony','similares'));
    }
}
