<?php

namespace App\Http\Livewire\Admin;

use App\Models\EmailSend as ModelsEmailSend;
use Livewire\Component;

class Emailsend extends Component
{
    public $status1,$status2;
    public $modulo1,$modulo2;

    public function mount(ModelsEmailSend $modulo1,ModelsEmailSend $modulo2){
        $this->modulo1 = $modulo1;
        $this->modulo2 = $modulo2;
        //ASIGNAR ESTATUS AL MODULO 1
        if($modulo1->status ==1){
            $this->status1='';
        }else{
            $this->status1=$modulo1->status;
        }
        //ASIGNAR ESTATUS AL MODULO 2
        if($modulo2->status ==1){
            $this->status2='';
        }else{
            $this->status2=$modulo2->status;
        }
    }

    public function render()
    {
        return view('livewire.admin.emailsend');
    }
    
    public function status1(){
        if($this->status1==1){
            $this->modulo1->status='2';
            $this->modulo1->save();
            session()->flash('success', 'Se ha actualizado el envio de correo de '.$this->modulo1->name. ', ahora  al publicar se enviaran correos electronicos');
        }else{
            $this->modulo1->status='1';
            $this->modulo1->save();
            session()->flash('danger', 'Se ha actualizado el envio de correo de '.$this->modulo1->name. ', ahora  al publicar no se enviaran correos electronicos');
        
        }
    }

    
    public function status2(){
        if($this->status2==1){
            $this->modulo2->status='2';
            $this->modulo2->save();
            session()->flash('success', 'Se ha actualizado el envio de correo de '.$this->modulo2->name. ', ahora  al publicar se enviaran correos electronicos');
        }else{
            $this->modulo2->status='1';
            $this->modulo2->save();
            session()->flash('danger', 'Se ha actualizado el envio de correo de '.$this->modulo2->name. ', ahora  al publicar no se enviaran correos electronicos');
        
        }
    }
}
