<?php

namespace App\Http\Controllers\Admin\secretary;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Manager;
use App\Models\User;
use GuzzleHttp\Psr7\Request;

class HelperController extends Controller
{
    public function manager()
    {
        return view('admin.secretary.group.manager');
    }

    public function store()
    {
        $manager = Manager::find(request('id'));
        $manager->update([
            'user_id'=>request('manager')
        ]);
        return redirect()->route('admin.secretary.group.index')->with('info','Encargado asignado con exito');
    }  
    
    public function team($user){
        $count = User::find($user)->descendantsAndSelf()->count();
        $users = User:: find($user)->descendants;             

        if($count==1){
            return redirect()->route('admin.secretary.user.index')->with('delete','el usuario no tiene equipo');
        }
        $us = User:: find($user);
        return view('admin.secretary.user.team',compact('users','us'));
    }

    public function group($id){
        $users = User::where('group_id',$id)->get();
        $us = Group::find($id);
        return view('admin.secretary.user.team',compact('users','us'));
    }
}
