<?php

namespace App\Http\Livewire\Blog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Suscripcion extends Component
{
    private $validar=null;
    public $email;
    public $bandera=1;
    public $respuesta;
    public $correo,$boton;
    
    public function render()
    {   
       
        return view('livewire.blog.suscripcion',['validar'=>$this->validar,'respuesta'=>$this->respuesta]);
    }

    public function suscribirse(){
        $this->validate([
            'email' => 'required',
        ]);
        $this->correo=$this->email;
        $this->email="";
        $this->validar =Http::get('https://api.getemail.io/v2/verif-email?api_key=MntLeNei8kRbN1iS63gS&email='.$this->correo)->json();
        $hola=json_encode($this->validar);
        $this->validar=json_decode($hola);
        session()->flash('message', 'exoto');
    }
}
