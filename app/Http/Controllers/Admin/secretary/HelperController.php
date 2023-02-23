<?php

namespace App\Http\Controllers\Admin\Secretary;

use App\Http\Controllers\Controller;
use app\Models\Red;
use App\Models\Manager;
use App\Models\User;
use GuzzleHttp\Psr7\Request;

class HelperController extends Controller
{
    public function manager()
    {
        return view('admin.secretary.red.manager');
    }

    public function store()
    {
        $encargado = Manager::where('red_id',request('id_red'))->first();
        $encargado->update([
            'user_id'=>request('manager')
        ]);
        return redirect()->route('admin.secretary.red.index')->with('info','Encargado asignado con exito');
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


}
