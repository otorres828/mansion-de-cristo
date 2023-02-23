<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function iniciar(){
        $credentials = request(['email', 'password']);
            if(! auth()->attempt($credentials)){
                return back()->with('error','Las credenciales no coinciden con nuestro registro');
            }
        return redirect()->route('admin.blog.panel');
    }

    public function registrar(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);
        return $request->all();
        
    }
}
