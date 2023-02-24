<?php

namespace App\Http\Controllers\Admin\Secretary;

use App\Http\Controllers\Controller;
use App\Models\CelulasEvangelistica;
use App\Models\VisitaPendiente;
use Illuminate\Http\Request;

class CE extends Controller
{
    public function index(){
        $ce= CelulasEvangelistica::where('user_id',auth()->user()->id)->get();

        $cv=VisitaPendiente::where('user_id',auth()->user()->id)->where('estatus',2)->count();
        $pv=VisitaPendiente::where('user_id',auth()->user()->id)->where('estatus',1)->count();
        
        $cantidad_total= CelulasEvangelistica::where('user_id',auth()->user()->id)->count();
        $cantidad_visitar= $this->celulas_por_visitar();
        
        return view('admin.secretary.celulas.mis_ce',compact('ce','cv','pv','cantidad_total','cantidad_visitar'));
    }

    public function celulas_por_visitar(){
        $celulas= CelulasEvangelistica::where('user_id',auth()->user()->id)->get();
        $contador=0;
        foreach($celulas as $celula)
            if($celula->estatus)
                $contador=$contador+1;
        return $contador;
    }

    public function visitas_pendientes(){
        $ce= CelulasEvangelistica::where('user_id',auth()->user()->id)->get();

        $cv=VisitaPendiente::where('user_id',auth()->user()->id)->where('estatus',2)->count();
        $pv=VisitaPendiente::where('user_id',auth()->user()->id)->where('estatus',1)->count();
        $celulas=VisitaPendiente::where('estatus',1)->where('user_id',auth()->user()->id)->orderBy('fecha','asc')->get();
        return view('admin.secretary.celulas.visitas_pendientes',compact('ce','cv','pv','celulas'));

    }
}
