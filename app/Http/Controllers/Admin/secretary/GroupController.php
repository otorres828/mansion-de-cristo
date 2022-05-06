<?php

namespace App\Http\Controllers\Admin\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Manager;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
        $groups = Manager::where('temple_id',auth()->user()->temple_id)->get();
        return view('admin.secretary.group.index',compact('groups'));
    }


  
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
         ]);      
        $group = Group::create([
            'name'=>$request['name'],
            'temple_id'=>auth()->user()->temple_id,

         ]);
        
        Manager::create([
                        'id'=> Group::latest('id')->first()->id,
                        'temple_id'=>auth()->user()->temple_id,
                        'group_id'=> Group::latest('id')->first()->id
        ]);

        return redirect()->route('admin.secretary.group.index')->with('info','La red '.$group->name.' se creo con exito');    
    }


    public function update(Request $request, Group $rede)
    {
        $request->validate([
            'name'=>'required',
         ]); 
         $rede->update([
            'name'=>$request['name'],
         ]);
         return redirect()->route('admin.secretary.group.index',$rede)->with('info','Se actualizo la red');
    }

   
    public function destroy(Group $rede)
    {
        $rede->delete();
        return redirect()->route('admin.secretary.group.index')->with('delete','La red se elimino con exito');
    }


}