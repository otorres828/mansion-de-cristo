<?php

namespace App\Http\Controllers\Admin\Secretary;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Hierarchy;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{

    public function index()
    {
        $users = User::find(auth()->user()->id)->descendants;
        return view('admin.secretary.user.index', compact('users'));
    }

    public function store(Request $request)
    {
<<<<<<< HEAD
        $request->validate([
            'parent_id'=>'required',
            'hierarchy_id'=>'required',
            'group_id'=>'required',
        ]);

        $user=User::create([
=======
        $user = User::create([
>>>>>>> 112b94aacad702aaff66dc5aa17350b81721edeb
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'temple_id' => $request['temple_id'],
            'group_id' => $request['group_id'],
            'hierarchy_id' => $request['hierarchy_id'],
            'parent_id' => $request['parent_id'],
        ]);
<<<<<<< HEAD
        $nivel = Hierarchy::all()->count(); 
  
        if($request['temple_id']==1 && $request['hierarchy_id']<$nivel-1)
=======
        $nivel = Hierarchy::all()->count();

        if ($request['temple_id'] == 1 && $request['hierarchy_id'] < $nivel)
>>>>>>> 112b94aacad702aaff66dc5aa17350b81721edeb
            $user->assignRole('Enseñanzas');
        // $request->validate( [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', new Password, 'confirmed'],
        // ]);

        // User::create([
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        // ]);
        return redirect()->route('admin.secretary.user.index')->with('info', 'Usuario Registrado con exito');
    }
<<<<<<< HEAD
    
  
    public function update(Request $request, User $usuario)
=======


    public function update(UserRequest $request, User $usuario)
>>>>>>> 112b94aacad702aaff66dc5aa17350b81721edeb
    {
        $request->validate([
            'name' =>'required',
            'parent_id'=>'required',
            'hierarchy_id'=>'required',
            'group_id'=>'required',
        ]);
        $usuario->update($request->all());
        return redirect()->route('admin.secretary.user.index')->with('info', 'Usuario actualizado con exito');
    }


    public function destroy($user)
    {
        $user = User::find($user);
        if ($user->email_verified_at == null) {
            session()->flash('info', 'Usuario eliminado con exito');
            $user->delete();
        } else {
            session()->flash('delete', 'No se pudo eliminar el usuario porque ya verifico su correo, por favor contactese con soporte tecnico: OLIVERTORRES1997@GMAIL.COM');
        }
        return redirect()->route('admin.blog.user.index');
    }
}
