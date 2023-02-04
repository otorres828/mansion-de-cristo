<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Models\Ministry;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class MinisteryController extends Controller
{
    public function index(){
        return view('blog.ministery.index');
    }

    public function show(Ministry $ministerio){
        $this->authorize('publicado',$ministerio); 
        $similares = Ministry::where('status',2)
                            ->where('id','!=',$ministerio->id)
                            ->take(4)
                            ->latest('id')
                            ->get();
        $testimonios = Testimony::where('status',2)
                            ->take(6)
                            ->latest('id')
                            ->get();

        $fecha = date("Y-m-d");
        $ip = $_SERVER["REMOTE_ADDR"] ?? "";
        $url=route('blog.show_ministery',$ministerio);
        DB::select("INSERT INTO visitas(fecha, ip, pagina, url) 
                   VALUES('$fecha', '$ip', '$ministerio->name', '$url')");
                   
        return view('blog.ministery.show',compact('ministery','similares','testimonios'));
    }
}
