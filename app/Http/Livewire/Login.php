<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $correo,$clave;

    public function render()
    {
        return view('livewire.login');
    }

    public function save(){
        $credentials =['email'=>$this->correo, 'password'=>$this->clave];
        if(! auth()->attempt($credentials)){
            return back()->with('error','Las credenciales no coinciden con nuestro registro');
        }
        return redirect()->route('admin.blog.panel');
    }
}
