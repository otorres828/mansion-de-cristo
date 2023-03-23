<?php

namespace App\Http\Livewire\Admin;

use App\Models\SolicitudesConyugue;
use App\Models\User;
use App\Models\VisitaPendiente;
use Livewire\Component;

class Conyugue extends Component
{
    protected $listeners = ['render' => 'render'];

    public $conyugue=null,$user=null;
    public $codigo,$visitas_pendientes,$ce_visitadas;
    public $yo;
    public $showModal=false;
    public $solicitud=null;

    public function render()
    {
        $this->yo=auth()->user();
        $user=auth()->user();
        $this->solicitud = SolicitudesConyugue::where('manda',$this->yo->id)->orWhere('recibe',$this->yo->id)->first();
        if ($user->conyugue) {
            $this->conyugue=User::find($user->conyugue);
        }
        return view('livewire.admin.conyugue');
    }

    public function verificar(){
        $this->user=User::where('codigo',$this->codigo)->first();
        if(!$this->user || $this->codigo=='')
            session()->flash('status',"Usuario no existe");
        else if ($this->user && $this->user->conyugue)
            session()->flash('status',"El usuario ya tiene conyugue");
        else{
            if($this->user->genero==$this->yo->genero)
                session()->flash('status',"El usuario que selecciono tiene el mismo genero que usted");
            else{
                $this->visitas_pendientes=VisitaPendiente::where('user_id',$this->user->id)->where('estatus',1)->count();
                $this->ce_visitadas=VisitaPendiente::where('user_id',$this->user->id)->where('estatus',2)->count();
                $this->showModal=true;
            }
        }
    }

    public function enviar(){
        $this->codigo='';
        $this->showModal=false;
        SolicitudesConyugue::create(['manda'=>$this->yo->id,'recibe'=>$this->user->id]);
    }

    public function cancelar(){
        $this->solicitud->delete();
    }

    public function aceptar(){
            if($this->solicitud->manda==$this->yo->id){                  //SI EL USUARIO AUTENTICADO COINCIDE CON EL QUE MANDA
                $this->yo->update(['conyugue'=>$this->solicitud->recibe]);             // SE LE ASIGNA AL USUARIO EL CODIGO DEL QUE RECIBE
                $pareja = User::find($this->solicitud->recibe);
                $pareja->update(['conyugue'=>$this->solicitud->manda]);
            }else{
                $this->yo->update(['conyugue'=>$this->solicitud->manda]);             // SE LE ASIGNA AL USUARIO EL CODIGO DEL QUE RECIBE
                $pareja = User::find($this->solicitud->manda);
                $pareja->update(['conyugue'=>$this->solicitud->recibe]);
            }
            $this->cancelar();
            $this->emit('render');
    }

}
