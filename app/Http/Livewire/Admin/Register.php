<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jerarquia;
use App\Models\Red;
use App\Models\Temple;
use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $correo,$nombre,$codigo,$iglesia,$jerarquia,$jerarquias,$genero;
    public $user,$redes,$red,$verificar_master=0;

    public function render()
    {
        $this->user = User:: find(auth()->user()->id);
        $temple = Temple::find($this->user->temple_id);
        $this->verificar_rol();

        $this->jerarquias = Jerarquia::where('temple_id',$this->user->temple_id)
                                ->where('nivel','>',$this->user->jerarquia->nivel)
                                ->get();
                                
        return view('livewire.admin.register',compact('temple'));
    }

    public function save(){
        $correo=User::where('email',$this->correo)->first();
        if($correo)
            session()->flash('error','Ups, algo salio mal. El correo ya ha sido registrado');
        else {
            if($this->codigo!=''){
                $jerarquia=Jerarquia::find($this->jerarquia);
                if($jerarquia){
                    $cobertura=User::where('codigo',$this->codigo)->first();
                    if($cobertura){
                        if($jerarquia->nivel<$cobertura->jerarquia->nivel){
                            session()->flash('error','Ups, algo salio mal. El nivel de su jerarquia no puede ser superior o igual al de su cobertura.');
                        }else{
                            if($cobertura->red_id==$this->red || $this->verificar_master>0){
                                User::create([
                                    'name' => $this->nombre,
                                    'email' => $this->correo,
                                    'temple_id' => $cobertura->temple_id,
                                    'red_id' => $this->red,
                                    'jerarquia_id' => $this->jerarquia,
                                    'password' => bcrypt('clave'),
                                    'codigo' => strtoupper(bin2hex(random_bytes(3))),
                                    'parent_id'=>$cobertura->id,
                                    'genero'=>$this->genero,
                                ]);
                               return redirect()->route('admin.secretary.equipo.index')->with('info',"Registrado con exito");

                            }else{
                                session()->flash('error','Ups, algo salio mal. El codigo de la cobertura no pertenece a la red: '.$this->red);
                            }
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

    public function verificar_rol(){
        $roles = $this->user->getRoleNames();
        foreach ($roles as $rol) {
            if ( $rol == 'Master') {
                $this->verificar_master++;
                $this->redes=Red::where('temple_id',$this->user->temple_id)->get();
                $this->red=Red::where('temple_id',$this->user->temple_id)->first()->id;
            }
        }
        if($this->verificar_master==0){
            $this->redes=Red::where('temple_id', $this->user->temple_id)->get();
            $this->red=$this->user->red_id;
        }
    }
}
