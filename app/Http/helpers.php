<?php

use App\Models\Visitas;
use Illuminate\Support\Facades\DB;

function fechaInicioYFinDeMes()
{

    $inicio = date("Y-m-01");
    $fin = date("Y-m-t");
    return [$inicio, $fin];
}
function fechaHoy()
{
    return date("Y-m-d");
}
/*
Nota: está limitado a solo traer los 10 primeros registros, ordenados por las veces que se visitaron
*/
function obtenerPaginasVisitadasEnFecha($fecha)
{
    $visitas= DB::select("SELECT COUNT(*) AS conteo_visitas, 
                count(distinct ip) as conteo_visitantes, url, pagina
                FROM visitas where fecha ='$fecha'
                group by url, pagina
                ORDER BY conteo_visitas DESC
                "); 
    return $visitas;
}

function obtenerConteoVisitasYVisitantesDePaginaEnRango($fechaInicio, $fechaFin, $url)
{
    return (object)[
        "visitantes" => obtenerConteoVisitantesDePaginaEnRango($fechaInicio, $fechaFin, $url),
        "visitas" => obtenerConteoVisitasDePaginaEnRango($fechaInicio, $fechaFin, $url),
    ];
   
}
function obtenerConteoVisitantesDePaginaEnRango($fechaInicio, $fechaFin, $url)
{
    $visitas= DB::select("SELECT COUNT(DISTINCT ip) AS conteo FROM visitas WHERE fecha >='$fechaInicio' AND fecha <='$fechaFin AND url ='$url");
    return (object)$visitas['conteo'];
}

function obtenerConteoVisitasDePaginaEnRango($fechaInicio, $fechaFin, $url)
{
    return Visitas::where('fecha','>=',$fechaInicio)->where('fecha','<=',$fechaFin)->where('url','=',$url)->count();
    $visitas=DB::select("SELECT COUNT(*) AS conteo FROM visitas WHERE fecha >='$fechaInicio' AND fecha <='$fechaFin' AND url ='$url'");
    return (object)$visitas['conteo'];
    }


function obtenerVisitantesDePaginaEnRango($fechaInicio, $fechaFin, $url)
{
    return DB::select("SELECT fecha, COUNT(DISTINCT ip) AS conteo FROM visitas WHERE fecha >='$fechaInicio' AND fecha <='$fechaFin' AND url ='$url' GROUP BY fecha");
}
function obtenerVisitasDePaginaEnRango($fechaInicio, $fechaFin, $url)
{
    return DB::select("SELECT fecha, COUNT(*) AS conteo FROM visitas WHERE fecha >='$fechaInicio' AND fecha <='$fechaFin' AND url ='$url' GROUP BY fecha");
}

function obtenerConteoVisitasYVisitantesEnRango($fechaInicio, $fechaFin)
{
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

function obtenerConteoVisitantesEnRango($fechaInicio, $fechaFin)
{
    return $registrar=DB::select("SELECT COUNT(DISTINCT ip) AS conteo FROM visitas WHERE fecha >='$fechaInicio' AND fecha <='$fechaFin'");

}

function obtenerConteoVisitasEnRango($fechaInicio, $fechaFin)
{
    return $registrar=DB::select("SELECT COUNT(*) AS conteo FROM visitas WHERE fecha >='$fechaInicio' AND fecha <='$fechaFin'");

}

function obtenerVisitantesEnRango($fechaInicio, $fechaFin)
{
    return $registrar=DB::select("SELECT fecha, COUNT(DISTINCT ip) AS conteo FROM visitas WHERE fecha >='$fechaInicio' AND fecha <='$fechaFin' GROUP BY fecha");

}
function  obtenerVisitasEnRango($fechaInicio, $fechaFin)
{
    return $registrar=DB::select("SELECT fecha, COUNT(*) AS conteo FROM visitas WHERE fecha >='$fechaInicio' AND fecha <='$fechaFin' GROUP BY fecha");
}


?>