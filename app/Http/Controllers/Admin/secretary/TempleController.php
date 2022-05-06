<?php

namespace App\Http\Controllers\Admin\Secretary;
use App\Http\Controllers\Controller;
use App\Http\Requests\TempleRequest;
use App\Models\Group;
use App\Models\Hierarchy;
use App\Models\Temple;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;

class TempleController extends Controller
{  
    public function index()
    {
        $temples = Temple::where('id','>','1')->get();
        return view('admin.secretary.temple.index',compact('temples'));
    }

    public function create()
    {
        return view('admin.secretary.temple.create');
    }

    
    public function store(TempleRequest $request)
    {
        
        //SE CREA LA IGLESIA
        $temple = Temple::create(['name'=>$request['name'],
                                  'slug'=>$request['slug'],
                                  ]);
        //SE CREA LA JERARQUIA MASTER DEL ENCARGADO
        $hierarchy = Hierarchy::create(['name'=>'MASTER',
                                        'slug'=>'master',
                                        'nivel'=>'0',
                                        'temple_id'=>$temple->id]);
        //SE CREA SU PRIMERA RED POR DEFECTO 1                                
        $group = Group::create(['name'=>'1',
                                'slug'=>'1',
                                'temple_id'=>$temple->id]);
        //SE CREA EL USUARIO ENCARGADO DE LA IGLESIA
        $user = User::create(['name' => $request['represent'],
                              'email' => $request['email'],
                              'password'=>bcrypt($request['password']),
                              'temple_id' => $temple->id,
                              'group_id' => $group->id,
                              'hierarchy_id' => $hierarchy->id,
                              'parent_id' => null,
                            ])->assignRole('Submaster');   
        //SE ANEXA LA RED EN LA TABLA INTERMEDIA MANAGER
        Manager::create([
                        'id'=> Group::latest('id')->first()->id,
                        'temple_id'=>$temple->id,
                        'group_id'=> $group->id
        ]);     
        return redirect()->route('admin.secretary.temple.index')->with('info','Iglesia Registrada con exito');
    }


    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy( $temple)
    {
        Temple::find($temple)->delete();
        return redirect()->route('admin.secretary.temple.index')->with('delete','La iglesia se elimino con exito');
    }
}
