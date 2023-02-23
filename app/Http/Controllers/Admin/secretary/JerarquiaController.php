<?php

namespace App\Http\Controllers\Admin\Secretary;
use App\Http\Controllers\Controller;
use App\Http\Requests\JerarquiaRequest;
use App\Models\Jerarquia;
use App\Models\User;

class JerarquiaController extends Controller
{

    public function index()
    {
        $user = User:: find(auth()->user()->id);  
        $jerarquias = Jerarquia::where('temple_id',$user->temple_id)
                                ->where('nivel','!=','0')->get();
        return view('admin.secretary.jerarquia.index',compact('jerarquias'));
    }

    public function store(JerarquiaRequest $request)
    {
        $jerarquia = Jerarquia::create($request->all());
        return redirect()->route('admin.secretary.jerarquia.index')->with('info','La categoria '.$jerarquia->name.' se creo con exito');    
    }

   
    public function update(JerarquiaRequest $request, Jerarquia $jerarquia)
    {
        $jerarquia->update($request->all());
        return redirect()->route('admin.secretary.jerarquia.index')->with('info','Se actualizo la jerarquia');
    }

   
    public function destroy(Jerarquia $jerarquia)
    {
        $jerarquia->delete();
        return redirect()->route('admin.secretary.jerarquia.index')->with('delete','La jerarquia se elimino con exito');
    }
}
