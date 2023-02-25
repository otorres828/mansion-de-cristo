<?php

namespace App\Http\Controllers\Admin\secretary;

use App\Http\Controllers\Controller;
use App\Models\Celula;
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

    public function store(Request $request){
        $request->validate([
            'anfitrion'=>'required',
            'ubicacion'=>'required',
        ]);
        CelulasEvangelistica::create([
            'anfitrion'=>$request->anfitrion,
            'ubicacion'=>$request->ubicacion,
            'telefono'=>$request->telefono,
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->route('celulas_evangelisticas.index')->with('info','Se añadio la celula con exito');

    }

    public function update(Request $request, CelulasEvangelistica $celula){
        $request->validate([
            'anfitrion'=>'required',
            'ubicacion'=>'required',
        ]);
        $celula->update($request->all());
        return redirect()->route('celulas_evangelisticas.index')->with('info','Se actualizo la celula con exito');

    }


    public function destroy(CelulasEvangelistica $celula)
    {
        $celula->delete(); 
        return redirect()->route('celulas_evangelisticas.index')->with('info','Se elimino la celula con exito');

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

    public function celulas_visitadas(){
         $ce= CelulasEvangelistica::where('user_id',auth()->user()->id)->get();

        $cv=VisitaPendiente::where('user_id',auth()->user()->id)->where('estatus',2)->count();
        $pv=VisitaPendiente::where('user_id',auth()->user()->id)->where('estatus',1)->count();
        
        $visitas=VisitaPendiente::where('user_id',auth()->user()->id)->where('estatus',2)->get();;
        return view('admin.secretary.celulas.todas_visitas',compact('ce','cv','pv','visitas'));

    }

    public function visitas_celula($id){
        $celula= CelulasEvangelistica::find($id);
        $ce= CelulasEvangelistica::where('user_id',auth()->user()->id)->get();

        $cv=VisitaPendiente::where('user_id',auth()->user()->id)->where('estatus',2)->count();
        $pv=VisitaPendiente::where('user_id',auth()->user()->id)->where('estatus',1)->count();
        
        $visitas=VisitaPendiente::where('user_id',auth()->user()->id)->where('estatus',2)->where('celula_id',$id)->get();;
        return view('admin.secretary.celulas.visitas_celula',compact('ce','cv','pv','visitas','celula'));

    }

    public function convertir($id,Request $request){
        $celula=CelulasEvangelistica::find($id);
        Celula::create([
            'user_id'=>auth()->user()->id,
            'ubicacion'=>$celula->ubicacion,
            'dia'=>$request->dia,
            'anfitrion'=>$celula->anfitrion,
            'telefono'=>$celula->telefono
        ]);
        $celula->delete();
        return redirect()->route('celulas_evangelisticas.index')->with('info','Se convirtio la celula evangelistica a celula oficial con exito');
    }
}
