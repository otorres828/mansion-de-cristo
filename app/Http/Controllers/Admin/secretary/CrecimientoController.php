<?php

namespace App\Http\Controllers\Admin\secretary;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrecimientoRequest;
use Illuminate\Http\Request;
use App\Models\Crecimiento;

class CrecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crecimientos = Crecimiento::all();
        return view('admin.secretary.crecimiento.index', compact('crecimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrecimientoRequest $request)
    {
        $Crecimiento = Crecimiento::create($request->all());

        return redirect()->back()->with('info', 'El crecimiento se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($crecimiento)
    {
        $crecimiento = Crecimiento::find($crecimiento);
        $crecimiento->delete();
        return redirect()->back()->with('delete', 'el crecimiento se elimino con exito');
    }
}
