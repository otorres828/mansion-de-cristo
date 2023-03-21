<?php

namespace App\Http\Controllers\Admin\secretary;

use App\Http\Controllers\Controller;
use App\Models\Celula;
use App\Models\Celulas_usuario;
use App\Models\User;
use Illuminate\Http\Request;

class CelulaController extends Controller
{

    public function index()
    {
        $user=auth()->user();
        if ($user->mi_conyugue) {
            $conyugue=User::find($user->conyugue);
            if($conyugue->genero=='H'){
                $celulas = Celula::where('user_id', '=', $conyugue->id)->get();

                $descendientes = User::find($conyugue->id)
                ->descendantsAndSelf
                ->pluck('name', 'id');
            }
            else{
                 $celulas = Celula::where('user_id', '=', auth()->user()->id)->get();
                $descendientes = User::find(auth()->user()->id)
                ->descendantsAndSelf
                ->pluck('name', 'id');
            }

        }else{
            $celulas = Celula::where('user_id', '=', auth()->user()->id)->get();
            $descendientes = User::find(auth()->user()->id)
                ->descendantsAndSelf
                ->pluck('name', 'id');
        }
        return view('admin.secretary.celulas.mis_celulas', compact('celulas', 'descendientes'));
    }

    public function store(Request $request)
    {
        $user=auth()->user();
        $celula= new Celula();
        $request->validate([
            'anfitrion' => 'required',
            'ubicacion' => 'required',
            'dia' => 'required',
            'user_id' => 'required',
        ]);
        $celula->anfitrion= $request->anfitrion;
        $celula->ubicacion= $request->ubicacion;
        $celula->dia= $request->dia;

        if ($user->mi_conyugue){
            if($user->mi_conyugue->id==$request->user_id || $user->id==$request->user_id){
                if($user->genero=='M')
                    $celula->user_id=$user->mi_conyugue->id;
                else
                    $celula->user_id=$user->id;
            }
            $celula->save();
        }else
            Celula::create($request->all());
        return redirect()->back()->with('info', 'Celula creada con exito con exitosamente');
    }

    public function show($id)
    {
        $celula = Celula::find($id);
        $celula_miembros = Celulas_usuario::where('celula_id', '=', $id)->get();
        return view('admin.secretary.celulas.detalles_celula', compact('celula', 'celula_miembros'));
    }

    public function update(Request $request, $id)
    {
        $celula = Celula::find($id);

        $request->validate([
            'anfitrion' => 'required',
            'ubicacion' => 'required',
            'dia' => 'required',
            'user_id' => 'required',
        ]);
        $celula->update($request->all());
        return redirect()->back()->with('info', 'Celula actualizada con exito');
    }

    public function destroy($celula)
    {
        $celula = Celula::find($celula);
        $celula->delete();
        return redirect()->back()->with('delete', 'La celula se elimino con exito');
    }

    public function celulas_mi_equipo()
    {
        $celulas_equipo = User::find(auth()->user()->id)->recursiveCelulas;
        // $celulas_equipo =$celulas_equipo->filter(function ($celula, $index) {
        //     return $celula->user_id != auth()->user()->id;
        // });
        $descendientes = User::find(auth()->user()->id)
            ->descendants
            ->pluck('name', 'id');
        return view('admin.secretary.celulas.celulas_equipo', compact('celulas_equipo', 'descendientes'));
    }

    public function miembro($id)
    {
        $user = User::find($id);
        $celulas_miembro = $user->recursiveCelulasTodas;
        return view('admin.secretary.celulas.miembro', compact('celulas_miembro', 'user'));
    }
}
