<?php

namespace App\Http\Livewire\Admin;

use App\Models\EmailSend;
use Livewire\Component;

class Mantenimiento extends Component
{
    public $status1,$status2,$status3;
    public $modulo1,$modulo2,$modulo3;

    public function mount(EmailSend $modulo1){
        $this->modulo1 = $modulo1;
        //ASIGNAR ESTATUS AL MODULO 1 MANTENIMIENTO BLOG
        if($modulo1->status ==1){
            $this->status1='';
        }else{
            $this->status1=$modulo1->status;
        }
      
    }

    public function render()
    {
        return view('livewire.admin.mantenimiento');
    }
    
    public function status1(){
        if($this->status1==1){
            $this->modulo1->status='2';
            $this->modulo1->save();
            session()->flash('success', 'Se ha actualizado la visibilidad de '.$this->modulo1->name. ', ahora se puede acceder a la pagina de la iglesia');
        }else{
            $this->modulo1->status='1';
            $this->modulo1->save();
            session()->flash('danger', 'Se ha actualizado la visibilidad de '.$this->modulo1->name. ', ahora no se puede acceder a la pagina de la iglesia');
        
        }
    }

}
