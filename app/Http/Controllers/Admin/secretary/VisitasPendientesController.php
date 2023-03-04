<?php

namespace App\Http\Controllers\Admin\secretary;

use App\Http\Controllers\Controller;
use App\Models\CelulasEvangelistica;
use App\Models\VisitaPendiente;
use Illuminate\Http\Request;

class VisitasPendientesController extends Controller
{
    public function index(){
        $ce= CelulasEvangelistica::where('user_id',auth()->user()->id)->get();
        $cv=VisitaPendiente::where('user_id',auth()->user()->id)->where('estatus',2)->count();
        $pv=VisitaPendiente::where('user_id',auth()->user()->id)->where('estatus',1)->count();
        $celulas=VisitaPendiente::where('estatus',1)->where('user_id',auth()->user()->id)->orderBy('fecha','asc')->get();
        return view('admin.secretary.celulas.visitas_pendientes',compact('ce','cv','pv','celulas'));
    }

    public function update(Request $request, VisitaPendiente $visita){
        $request->validate([
            'fecha'=>'required',
        ]);
        $visita->update($request->all());
        return redirect()->route('visitas_pendientes.index')->with('info','Se elimino la celula con exito');
    }

    public function destroy(VisitaPendiente $visita)
    {
        $visita->delete(); 
        return redirect()->route('visitas_pendientes.index')->with('info','Se elimino la celula con exito');
    }

    public function finalizar(VisitaPendiente $visita,Request $request){
        $request->validate(['observaciones'=>'required']);
        $visita->update(['observaciones'=>$request->observaciones,'estatus'=>2]);
        $mensaje='Se finalizo la visita con exito';
        if($request->fecha){
            VisitaPendiente::create([
                    'user_id'=>$visita->user_id,
                    'celula_id'=>$visita->celula_id,
                    'estatus'=>1,
                    'fecha'=>$request->fecha
                ]);
            $mensaje='Se finalizo la visita con exito y se creo la proxima visita el '.$request->fecha;
        }

        return redirect()->route('visitas_pendientes.index')->with('info',$mensaje);
    }
}
