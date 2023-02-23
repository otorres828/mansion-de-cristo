<?php

namespace App\Http\Controllers\Admin\secretary;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrecimientoRequest;
use Illuminate\Http\Request;
use App\Models\Crecimiento;

class CrecimientoController extends Controller
{

    public function index()
    {
        $crecimientos = Crecimiento::all();
        return view('admin.secretary.crecimiento.index', compact('crecimientos'));
    }


    public function create()
    {
        //
    }


    public function store(CrecimientoRequest $request)
    {
        $Crecimiento = Crecimiento::create($request->all());

        return redirect()->back()->with('info', 'El crecimiento se creo con exito');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
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
}
