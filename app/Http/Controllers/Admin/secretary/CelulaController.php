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
        $descendientes = User::find(auth()->user()->id)
            ->descendantsAndSelf
            ->pluck('name', 'id');
        return view('admin.secretary.celulas.mis_celulas', compact('celulas', 'descendientes'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'fecha_hora' => 'required',
            'user_id' => 'required',
        ]);

        Celula::create($request->all());
        return redirect()->route('celulas.index')->with('success', 'Celula creada con exito con exitosamente');
    }

    public function show(Celula $celula)
    {
        return view('admin.secreta.detalles_celula', compact('celula'));
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


    public function mi_equipo()
    {
        $celulas_equipo = User::find(auth()->user()->id)->recursiveCelulas;
        $celulas_equipo->filter(function ($celula, $index) {
            return $celula->user_id != auth()->user()->id;
        });
        $descendientes = User::find(auth()->user()->id)
            ->descendants
            ->pluck('name', 'id');
        return view('admin.secretary.celulas.celulas_equipo', compact('celulas_equipo', 'descendientes'));
    }

    public function miembro($id)
    {
        $celulas_miembro = User::find($id)->recursiveCelulas;
        return view('admin.secretary.celulas.miembro', compact('celulas_miembro'));
    }
}
