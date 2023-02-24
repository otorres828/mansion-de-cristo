<?php

namespace App\Http\Livewire;

use App\Models\Jerarquia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public $nombre,$correo,$clave,$confirmarclave,$jerarquia,$cobertura,$genero;

    public function render()
    {
        return view('livewire.register');
    }

    public function save(){
        $correo=User::where('email',$this->correo)->first();
        if($correo)
            session()->flash('error','Ups, algo salio mal. El correo ya ha sido registrado');
        else if($this->clave==$this->confirmarclave){
            if($this->codigo!=''){

                $jerarquia=Jerarquia::find($this->jerarquia);
                if($jerarquia){
                    $cobertura=User::where('codigo',$this->cobertura)->first();
                    if($cobertura){
                        if($jerarquia->nivel<=$cobertura->jerarquia->nivel){
                            session()->flash('error','Ups, algo salio mal. El nivel de su jerarquia no puede ser superior o igual al de su cobertura.');
                        }else{
                            $user=User::create([
                                'name' => $this->nombre,
                                'email' => $this->correo,
                                'temple_id' => $cobertura->temple_id,
                                'red_id' => $cobertura->red_id,
                                'jerarquia_id' => $jerarquia->id,
                                'password' => bcrypt($this->clave),
                                'codigo' => strtoupper(bin2hex(random_bytes(3))),
                                'genero'=>$this->genero,
                                'parent_id'=>$cobertura->id
                            ]);
                            Auth::login($user);
                            return redirect()->route('admin.blog.panel');
                        }
                    }else{
                        session()->flash('error','Ups, algo salio mal. El codigo de la cobertura no existe');
                    }
                }else{
                    session()->flash('error','Ups, algo salio mal. El codigo de la jerarquia no existe');
                }
            }else{
                session()->flash('error','Ups, algo salio mal. El codigo de la cobertura no puede quedar vacio');
            }
        }else{
            session()->flash('error','Ups, algo salio mal. Las claves no coinciden');
        }
    }
}
