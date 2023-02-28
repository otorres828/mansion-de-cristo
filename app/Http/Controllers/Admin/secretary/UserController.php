<?php

namespace App\Http\Controllers\Admin\Secretary;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Jerarquia;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $user=auth()->user();
        if($user->conyugue){
            $conyugue=User::find($user->conyugue);
            if($conyugue->genero=='H')
                $users = User::find($user->conyugue)->descendants;
            else
                $users = User::find(auth()->user()->id)->descendants;
        }else{
            $users = User::find(auth()->user()->id)->descendants;
        }
 
        return view('admin.secretary.equipo.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'parent_id'=>'required',
            'jerarquia_id'=>'required',
            'red_id'=>'required',
        ]);

        $user=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'temple_id' => $request['temple_id'],
            'red_id' => $request['red_id'],
            'jerarquia_id' => $request['jerarquia_id'],
            'parent_id' => $request['parent_id'],
        ]);
        $nivel = Jerarquia::all()->count(); 
  
        // if ($request['temple_id'] == 1 && $request['jerarquia_id'] < $nivel)
        //     $user->assignRole('Enseñanzas');

        return redirect()->route('admin.secretary.equipo.index')->with('info', 'Usuario Registrado con exito');
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
