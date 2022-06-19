<?php

namespace App\Http\Livewire\Admin;

use App\Models\EmailSend;
use Livewire\Component;

class Mantenimiento extends Component
{
    public $status1,$status2,$status3,$status4,$status5,$status6,$status7,$status8;
    public $modulo1,$modulo2,$modulo3,$modulo4,$modulo5,$modulo6,$modulo7,$modulo8;

    public function mount(EmailSend $modulo1,EmailSend $modulo2,EmailSend $modulo3,EmailSend $modulo4,EmailSend $modulo5,EmailSend $modulo6,EmailSend $modulo7,EmailSend $modulo8){
        $this->modulo1 = $modulo1;
        //ASIGNAR ESTATUS AL MODULO 1 MANTENIMIENTO BLOG
        if($modulo1->status ==1){
            $this->status1='';
        }elseif($modulo1->status ==2){
            $this->status1=$modulo1->status;
        }
        //ASIGNAR ESTATUS AL MODULO 1 MANTENIMIENTO BLOG
        if($modulo1->status ==1){
            $this->status1='';
        }elseif($modulo1->status ==2){
            $this->status1=$modulo1->status;
        }
        //ASIGNAR ESTATUS AL MODULO 2 MANTENIMIENTO BLOG
        if($modulo2->status ==1){
            $this->status2='';
        }elseif($modulo2->status ==2){
            $this->status2=$modulo2->status;
        }
        //ASIGNAR ESTATUS AL MODULO 3 MANTENIMIENTO BLOG
        if($modulo3->status ==1){
            $this->status3='';
        }elseif($modulo3->status ==2){
            $this->status3=$modulo3->status;
        }
        //ASIGNAR ESTATUS AL MODULO 4 MANTENIMIENTO BLOG
        if($modulo4->status ==1){
            $this->status4='';
        }elseif($modulo4->status ==2){
            $this->status4=$modulo4->status;
        }
        //ASIGNAR ESTATUS AL MODULO 5 MANTENIMIENTO BLOG
        if($modulo5->status ==1){
            $this->status5='';
        }elseif($modulo5->status ==2){
            $this->status5=$modulo5->status;
        }
        //ASIGNAR ESTATUS AL MODULO 6 MANTENIMIENTO BLOG
        if($modulo6->status ==1){
            $this->status6='';
        }elseif($modulo6->status ==2){
            $this->status6=$modulo6->status;
        }
        //ASIGNAR ESTATUS AL MODULO 7 MANTENIMIENTO BLOG
        if($modulo7->status ==1){
            $this->status7='';
        }elseif($modulo7->status ==2){
            $this->status7=$modulo7->status;
        }
        //ASIGNAR ESTATUS AL MODULO 8 MANTENIMIENTO BLOG
        if($modulo8->status ==1){
            $this->status8='';
        }elseif($modulo8->status ==2){
            $this->status8=$modulo8->status;
        }

        
    }

    public function render()
    {
        return view('livewire.admin.mantenimiento');
    }
    
    public function status($estado){
        if($estado==1){
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
        if($estado==2){
            if($this->status2==1){
                $this->modulo2->status='2';
                $this->modulo2->save();
                session()->flash('success', 'Se ha actualizado la visibilidad de '.$this->modulo2->name. ', ahora se puede acceder a la pagina de la iglesia');
            }else{
                $this->modulo2->status='1';
                $this->modulo2->save();
                session()->flash('danger', 'Se ha actualizado la visibilidad de '.$this->modulo2->name. ', ahora no se puede acceder a la pagina de la iglesia');
            
            }
        }
        if($estado==3){
            if($this->status3==1){
                $this->modulo3->status='2';
                $this->modulo3->save();
                session()->flash('success', 'Se ha actualizado la visibilidad de '.$this->modulo3->name. ', ahora se puede acceder a la pagina de la iglesia');
            }else{
                $this->modulo3->status='1';
                $this->modulo3->save();
                session()->flash('danger', 'Se ha actualizado la visibilidad de '.$this->modulo3->name. ', ahora no se puede acceder a la pagina de la iglesia');
            
            }
        }
        if($estado==4){
            if($this->status4==1){
                $this->modulo4->status='2';
                $this->modulo4->save();
                session()->flash('success', 'Se ha actualizado la visibilidad de '.$this->modulo4->name. ', ahora se puede acceder a la pagina de la iglesia');
            }else{
                $this->modulo4->status='1';
                $this->modulo4->save();
                session()->flash('danger', 'Se ha actualizado la visibilidad de '.$this->modulo4->name. ', ahora no se puede acceder a la pagina de la iglesia');
            
            }
        }
        if($estado==5){
            if($this->status5==1){
                $this->modulo5->status='2';
                $this->modulo5->save();
                session()->flash('success', 'Se ha actualizado la visibilidad de '.$this->modulo5->name. ', ahora se puede acceder a la pagina de la iglesia');
            }else{
                $this->modulo5->status='1';
                $this->modulo5->save();
                session()->flash('danger', 'Se ha actualizado la visibilidad de '.$this->modulo5->name. ', ahora no se puede acceder a la pagina de la iglesia');
            
            }
        }
        if($estado==6){
            if($this->status6==1){
                $this->modulo6->status='2';
                $this->modulo6->save();
                session()->flash('success', 'Se ha actualizado la visibilidad de acercade'.$this->modulo6->name. ', ahora se puede acceder a la pagina de la iglesia');
            }else{
                $this->modulo6->status='1';
                $this->modulo6->save();
                session()->flash('danger', 'Se ha actualizado la visibilidad deacercade '.$this->modulo6->name. ', ahora no se puede acceder a la pagina de la iglesia');
            
            }
        }
        if($estado==7){
            if($this->status7==1){
                $this->modulo7->status='2';
                $this->modulo7->save();
                session()->flash('success', 'Se ha actualizado la visibilidad de '.$this->modulo7->name. ', ahora se puede acceder a la pagina de la iglesia');
            }else{
                $this->modulo7->status='1';
                $this->modulo7->save();
                session()->flash('danger', 'Se ha actualizado la visibilidad de '.$this->modulo7->name. ', ahora no se puede acceder a la pagina de la iglesia');
            
            }
        }
        if($estado==8){
            if($this->status8==1){
                $this->modulo8->status='2';
                $this->modulo8->save();
                session()->flash('success', 'Se ha actualizado la visibilidad de '.$this->modulo8->name. ', ahora se puede acceder a la pagina de la iglesia');
            }else{
                $this->modulo8->status='1';
                $this->modulo8->save();
                session()->flash('danger', 'Se ha actualizado la visibilidad de '.$this->modulo8->name. ', ahora no se puede acceder a la pagina de la iglesia');
            
            }
        }
    }


}
