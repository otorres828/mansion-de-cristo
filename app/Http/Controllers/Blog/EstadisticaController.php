<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticaController extends Controller
{
    public function index(){
        return view('admin.blog.estadisticas');
    }

    public function registrar(Request $request){
        $fecha = date("Y-m-d");
        $ip = $_SERVER["REMOTE_ADDR"] ?? "";
        DB::select("INSERT INTO visitas(fecha, ip, pagina, url) VALUES('$fecha', '$ip', '$request->pagina', '$request->url')");
    }
}
