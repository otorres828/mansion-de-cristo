<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
  
    public function index()
    {
        $user = User:: find(auth()->user()->id);  
        $roles = $user->getRoleNames();   
        if($roles[0]=='Admin Blog'||  $roles[0]=='Master')
            $users = User::where('id','!=',$user->id)
                    ->where('id','!=',1)
                    ->get();
        else
            $users = User::all();

        return view('admin.blog.user.index',compact('users'));
    }

    public function edit(User $user)
    {
        $roles=Role::where('name','!=','Submaster')
                    ->where('name','!=','Master')->get();
        return view('admin.blog.user.edit',compact('user','roles'));
    }

  
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user = User:: find(auth()->user()->id);  
        return back()->with('info','Roles asignados con exito');
    }

 
}
