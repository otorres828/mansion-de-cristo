<?php

namespace App\Http\Controllers\Admin\Secretary;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Hierarchy;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $request->validate([
            'parent_id'=>'required',
            'hierarchy_id'=>'required',
            'group_id'=>'required',
        ]);

        $user=User::create([

            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'temple_id' => $request['temple_id'],
            'group_id' => $request['group_id'],
            'hierarchy_id' => $request['hierarchy_id'],
            'parent_id' => $request['parent_id'],
        ]);
        $nivel = Hierarchy::all()->count(); 
  
        if ($request['temple_id'] == 1 && $request['hierarchy_id'] < $nivel)
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
    
    public function update(UserRequest $request, User $usuario)
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

    //funcion eliminar usuario y confirmacion
    public function eliminar_usuario(Request $request){
        $request->validate([
            'password' => 'required'
        ]);
        if(Hash::check($request->password,auth()->user()->password)){           
            DB::update('update users set parent_id='.$request->parent_id.' where parent_id='.$request->id_usuario_eliminar);
            User::find($request->id_usuario_eliminar)->delete();
            return redirect()->back()->with('info','Usuario eliminado con exito, todos sus hijos directos tienen un nuevo padre');

        }
        return redirect()->back()->with('delete','Clave incorrecta, no se puede eliminar');
    }

        //cambiar cobertura
        public function cambiar_cobertura(Request $request){
            $request->validate([
                'password' => 'required'
            ]);
            if(Hash::check($request->password,auth()->user()->password)){           
                DB::update('update users set parent_id='.$request->parent_id.' where id='.$request->id_usuario_eliminar);
                return redirect()->back()->with('info','Se cambio la cobertura con exito');
            }
            return redirect()->back()->with('delete','Clave incorrecta, no se puede eliminar');
        }
}
