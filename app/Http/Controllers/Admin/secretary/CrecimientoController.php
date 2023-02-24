<?php

namespace App\Http\Controllers\Admin\secretary;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrecimientoRequest;
use App\Models\Crecimiento;
use App\Models\User;

class CrecimientoController extends Controller
{

    public function index()
    {
        $crecimientos = Crecimiento::all();
        return view('admin.secretary.crecimiento.index', compact('crecimientos'));
    }

    public function store(CrecimientoRequest $request)
    {
        $Crecimiento = Crecimiento::create($request->all());

        return redirect()->back()->with('info', 'El crecimiento se creo con exito');
    }


    public function update(CrecimientoRequest $request, $id)
    {
        // return $request->all();
        $crecimiento = Crecimiento::find($id);


        $crecimiento->update($request->all());
        return redirect()->back()->with('info', 'crecimiento actualizada con exito');
    }


    public function destroy($crecimiento)
    {
        $crecimiento = Crecimiento::find($crecimiento);
        $crecimiento->delete();
        return redirect()->back()->with('delete', 'el crecimiento se elimino con exito');
    }

    public function mi_crecimiento(){
        return view('admin.secretary.crecimiento.micrecimiento');
    }

    public function crecimiento_usuario($id){
        $user=User::findOrFail($id);
        $crecimientos = Crecimiento::where('status',2)->get();
        return view('admin.secretary.crecimiento.usuario',compact('crecimientos','user'));
    }
}
