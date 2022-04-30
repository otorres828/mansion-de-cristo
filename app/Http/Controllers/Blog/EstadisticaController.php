<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Visitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticaController extends Controller
{
    public function index(){
        $hoy=date('Y-m-d');
        return view('admin.blog.estadisticas.index',compact('hoy'));
    }

    public function registrar(Request $request){
        $fecha = date("Y-m-d");
        $ip = $_SERVER["REMOTE_ADDR"] ?? "";
        DB::select("INSERT INTO visitas(fecha, ip, pagina, url) VALUES('$fecha', '$ip', '$request->pagina', '$request->url')");
       
        echo "hola mundo";
    }

    public function mostrar(Request $request){
        $pagina=$request->pagina;
        $estadisticas=obtejerEstadisticas($request->pagina,$request->inicio,$request->fin);

        $data=[];
        foreach($estadisticas as $estadistica){
            $data['label'][]=$estadistica->fecha;
            $data['data'][]=$estadistica->conteo_visitas;
        }
        $data['data']=json_encode($data);
        return view('admin.blog.estadisticas.mostrar',$data,['pagina'=>$pagina
                                                            ,'inicio'=>$request->inicio,
                                                             'fin'=>$request->fin]);
    }
}
