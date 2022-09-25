<?php

namespace App\Http\Controllers\Admin\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Celula;
use App\Models\User;
use Illuminate\Http\Request;

class CelulaController extends Controller
{

    public function index()
    {
        $celulas = Celula::where('user_id', '=', auth()->user()->id)->get();
        return view ('admin.secretary.celulas.mis_celulas',compact('celulas'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'direccion' =>'required',
            'datatime' =>'required',
            'user_id' =>'required',
        ]);

        Celula::create($request->all());
        return redirect()->route('celulas.index')->with('success','Celula creada con exito con exitosamente');
    }

    public function show(Celula $celula)
    {
        return view('admin.secreta.detalles_celula',compact('celula'));
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function mi_equipo(){
        $celulas_equipo= User::find(auth()->user()->id)->recursiveCelulas;
        return view ('admin.secretary.celulas.celulas_equipo',compact('celulas_equipo'));

    }

    public function miembro($id){
        $celulas_miembro= User::find($id)->recursiveCelulas;
        return view ('admin.secretary.celulas.miembro',compact('celulas_miembro'));

    }
}
