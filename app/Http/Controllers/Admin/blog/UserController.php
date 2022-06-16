<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  
    public function index()
    {
        $user = User:: find(auth()->user()->id);  
        $roles = $user->getRoleNames();   
        foreach($roles as $rol){
            if($rol=='Master' || $rol=='Programador'){
                $users = User::where('id','!=',$user->id)
                        ->where('id','>',2)
                        ->get();
                $roles=Role::where('name','!=','Master')
                        ->where('name','!=','Submaster')
                        ->where('name','!=','Programador')->get();
            }else{
                $users = User::with('roles')
                            ->where('id','!=',$user->id)
                            ->where('id','>',2)
                            ->get();
                $roles=Role::where('name','!=','Master')
                        ->where('name','!=','Submaster')
                        ->where('name','!=','Admin Blog')
                        ->where('name','!=','Programador')->get();
            }
        }

        return view('admin.blog.user.index',compact('users','roles'));
    }

    public function store(Request $request){
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make('password'),
        ]);
        return redirect()->route('admin.blog.user.index')->with('info','Usuario Registrado con exito');
    }
  
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user = User:: find(auth()->user()->id);  
        return back()->with('info','Roles asignados con exito');
    }

    public function destroy($user)
    {
        $user=User::find($user);
        if($user->email_verified_at==null){
            session()->flash('info', 'Usuario eliminado con exito');
            $user->delete();
        }else{
            session()->flash('delete', 'No se pudo eliminar el usuario porque ya verifico su correo, por favor contactese con soporte tecnico: OLIVERTORRES1997@GMAIL.COM');
        }
        return redirect()->route('admin.blog.user.index');   
    }
}
