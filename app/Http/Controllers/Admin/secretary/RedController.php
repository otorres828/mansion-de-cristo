<?php

namespace App\Http\Controllers\Admin\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Red;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;

class RedController extends Controller
{

    public function index()
    {
        $redes = Red::where('temple_id',auth()->user()->temple_id)->get();
        return view('admin.secretary.red.index',compact('redes'));
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
         ]);      
        $group = Red::create([
            'name'=>$request['name'],
            'temple_id'=>auth()->user()->temple_id,

         ]);
        
        Manager::create([
                        'id'=> Red::latest('id')->first()->id,
                        'temple_id'=>auth()->user()->temple_id,
                        'red_id'=> Red::latest('id')->first()->id
        ]);

        return redirect()->route('admin.secretary.red.index')->with('info','La red '.$group->name.' se creo con exito');    
    }


    public function update(Request $request, Red $rede)
    {
        $request->validate([
            'name'=>'required',
         ]); 
         $rede->update([
            'name'=>$request['name'],
         ]);
         return redirect()->route('admin.secretary.red.index')->with('info','Se actualizo la red');
    }

   
    public function destroy(Red $rede)
    {
        $rede->delete();
        return redirect()->route('admin.secretary.red.index')->with('delete','La red se elimino con exito');
    }

    public function red($id){
        $users = User::where('red_id',$id)->get();
        $red = Red::find($id);
        return view('admin.secretary.user.red',compact('users','red'));
    }
}