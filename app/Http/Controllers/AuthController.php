<?php

namespace App\Http\Controllers;


class AuthController extends Controller
{
    public function iniciar(){
        $credentials = request(['email', 'password']);
            if(! auth()->attempt($credentials)){
                return back()->with('error','Las credenciales no coinciden con nuestro registro');
            }
        return redirect()->route('admin.blog.panel');
    }
}
