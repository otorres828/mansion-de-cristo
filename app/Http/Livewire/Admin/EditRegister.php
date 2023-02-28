<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jerarquia;
use App\Models\Temple;
use App\Models\User;
use Livewire\Component;

class EditRegister extends Component
{
    public $correo,$nombre,$codigo,$iglesia,$jerarquia,$jerarquias,$genero,$user;
    public function mount($user){
        $this->nombre=$user->name;
        $this->correo=$user->email;
        $this->codigo=User::find($user->parent_id)->codigo;
        $this->iglesia=$user->temple_id;
        $this->jerarquia=$user->jerarquia_id;
        $this->genero=$user->genero;
        $this->user=$user;
    }
    public function render()
    {
        $user = User:: find(auth()->user()->id);
        $temple = Temple::find($user->temple_id);
        $this->jerarquias = Jerarquia::where('temple_id',$user->temple_id)
                                ->where('nivel','>',$user->jerarquia->nivel)
                                ->get();

        return view('livewire.admin.edit-register',compact('temple'));
    }

    public function actualizar(){
        $correo=User::where('email',$this->correo)->first();
        if($correo && $correo->email!=$this->user->email)
            session()->flash('error','Ups, algo salio mal. El correo ya ha sido registrado');
        else {
            if($this->codigo!=''){
                $jerarquia=Jerarquia::find($this->jerarquia);
                if($jerarquia){
                    $cobertura=User::where('codigo',$this->codigo)->first();
                    if($cobertura){
                        if($jerarquia->nivel<=$cobertura->jerarquia->nivel){
                            session()->flash('error','Ups, algo salio mal. El nivel de su jerarquia no puede ser superior o igual al de su cobertura.');
                        }else{
                            $this->user->update([
                                'name' => $this->nombre,
                                'email' => $this->correo,
                                'red_id' => $cobertura->red_id,
                                'jerarquia_id' => $this->jerarquia,
                                'parent_id'=>$cobertura->id,
                                'genero'=>$this->genero,
                            ]);
                           return redirect()->route('admin.secretary.equipo.index')->with('info',"Actualizado con exito");
                        }
                    }else{
                        session()->flash('error','Ups, algo salio mal. El codigo de la cobertura no existe');
                    }
                }else{
                    session()->flash('error','Ups, algo salio mal. Debe seleccionar una jerarquia');
                }
            }else{
                session()->flash('error','Ups, algo salio mal. El codigo de la cobertura no puede quedar vacio');
            }
        }
    }
}
