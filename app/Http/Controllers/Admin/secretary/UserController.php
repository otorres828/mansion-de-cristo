<?php

namespace App\Http\Controllers\Admin\Secretary;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Hierarchy;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User:: find(auth()->user()->id)->descendants;             
        return view('admin.secretary.user.index',compact('users'));
    }
    
    public function store(UserRequest $request)
    {
        $user=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password'=>bcrypt($request['password']),
            'temple_id' => $request['temple_id'],
            'group_id' => $request['group_id'],
            'hierarchy_id' => $request['hierarchy_id'],
            'parent_id' => $request['parent_id'],
        ]);
        $nivel = Hierarchy::all()->count(); 
  
        if($request['temple_id']==1 && $request['hierarchy_id']<$nivel)
            $user->assignRole('Enseñanzas');
            
        return redirect()->route('admin.secretary.user.index')->with('info','Usuario Registrado con exito');
    }
    
  
    public function update(UserRequest $request, User $usuario)
    {
        $usuario->update($request->all());
        return redirect()->route('admin.secretary.user.index')->with('info','Usuario actualizado con exito');
    }

   
    public function destroy($id)
    {
        //
    }

}
