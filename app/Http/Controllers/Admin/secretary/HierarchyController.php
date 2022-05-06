<?php

namespace App\Http\Controllers\Admin\Secretary;
use App\Http\Controllers\Controller;
use App\Http\Requests\HierarchyRequest;
use App\Models\Hierarchy;
use App\Models\User;

class HierarchyController extends Controller
{

    public function index()
    {
        $user = User:: find(auth()->user()->id);  
        $hierarchies = Hierarchy::where('temple_id',$user->temple_id)
                                ->where('nivel','!=','0')->get();
        return view('admin.secretary.hierarchy.index',compact('hierarchies'));
    }

    public function store(HierarchyRequest $request)
    {
        $hierarchy = Hierarchy::create($request->all());
        return redirect()->route('admin.secretary.hierarchy.index')->with('info','La categoria '.$hierarchy->name.' se creo con exito');    
    }

   
    public function update(HierarchyRequest $request, Hierarchy $jerarquia)
    {
        $jerarquia->update($request->all());
        return redirect()->route('admin.secretary.hierarchy.index',$jerarquia)->with('info','Se actualizo la jerarquia');
    }

   
    public function destroy(Hierarchy $jerarquia)
    {
        $jerarquia->delete();
        return redirect()->route('admin.secretary.hierarchy.index')->with('delete','La jerarquia se elimino con exito');
    }
}
