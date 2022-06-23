<?php

use App\Models\Visitas;
use Illuminate\Support\Facades\DB;

function fechaInicioYFinDeMes()
{

    $inicio = date("Y-m-01");
    $fin = date("Y-m-t");
    return [$inicio, $fin];
}

// usada
function obtenerPaginasVisitadasEnFecha($inicio,$fin,$buscar)
{
    $inicio=$inicio?$inicio:date("Y-m-01");
    $fin=$fin?$fin:date("Y-m-01");

    $visitas = DB::table('visitas')
    ->select(DB::raw('COUNT(*) AS conteo_visitas, url,pagina,  COUNT(DISTINCT ip) AS conteo_visitantes'))
    ->where('fecha', '>=',$inicio)
    ->where('fecha', '<=',$fin) 
    ->where('pagina','like','%'.$buscar.'%')
    ->groupBy('url','pagina')
    ->orderBy('conteo_visitas','DESC')
    ->paginate(10);
    return $visitas;
}
//usada
function obtenerConteoVisitasYVisitantesEnRango($fechaInicio, $fechaFin)
{
    $fechaInicio=$fechaInicio?$fechaInicio:date("Y-m-01");
    $fechaFin=$fechaFin?$fechaFin:date("Y-m-01");

    $visitantes=obtenerConteoVisitantesEnRango($fechaInicio, $fechaFin);
    $v=$vv=null;
    foreach($visitantes as $visita){
        $v=$visita;
    }
    $visitantes=obtenerConteoVisitasEnRango($fechaInicio, $fechaFin);
    $vv=null;
    foreach($visitantes as $visita){
        $vv=$visita;
    }
    return (object)[
        "visitantes" => $v->conteo,
        "visitas" =>$vv->conteo,
    ];
}

//usada
function obtenerConteoVisitantesEnRango($fechaInicio, $fechaFin)
{
    return DB::select("SELECT COUNT(DISTINCT ip) AS conteo FROM visitas WHERE fecha >='$fechaInicio' AND fecha <='$fechaFin'");

}

//usada
function obtenerConteoVisitasEnRango($fechaInicio, $fechaFin)
{
    return DB::select("SELECT COUNT(*) AS conteo FROM visitas WHERE fecha >='$fechaInicio' AND fecha <='$fechaFin'");

}

function obtenerVisitantesEnRango($fechaInicio, $fechaFin)
{
    return $registrar=DB::select("SELECT fecha, COUNT(DISTINCT ip) AS conteo FROM visitas WHERE fecha >='$fechaInicio' AND fecha <='$fechaFin' GROUP BY fecha");

}

function obtejerEstadisticas($pagina,$inicio,$fin){
    return DB::table('visitas')
            ->select(DB::raw('COUNT(*) AS conteo_visitas,fecha'))
            ->where('pagina','=',$pagina)
            ->where('fecha', '>=',$inicio)
            ->where('fecha', '<=',$fin)
            ->groupBy('fecha')
            ->orderBy('conteo_visitas','desc')->get();
}
?>