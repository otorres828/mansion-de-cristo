<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Models\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class MinisteryController extends Controller
{
    public function index(){
        return view('blog.ministery.index');
    }

    public function show($slug){
        $ministery = Ministry::where('slug',$slug)->first();
        $this->authorize('publicado',$ministery); 
        $similares = Ministry::where('status',2)
                            ->where('id','!=',$ministery->id)
                            ->take(4)
                            ->latest('id')
                            ->get();

        $fecha = date("Y-m-d");
        $ip = $_SERVER["REMOTE_ADDR"] ?? "";
        $url=route('blog.show_ministery',$ministery);
        DB::select("INSERT INTO visitas(fecha, ip, pagina, url) 
                   VALUES('$fecha', '$ip', '$ministery->name', '$url')");
                   
        return view('blog.ministery.show',compact('ministery','similares'));
    }
}
