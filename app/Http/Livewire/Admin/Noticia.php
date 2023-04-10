<?php

namespace App\Http\Livewire\Admin;

use App\Models\Announce;
use App\Models\Teaching;
use App\Models\User;
use Livewire\Component;

class Noticia extends Component
{
    public $anuncios=[];
    public function render()
    {
        return view('livewire.admin.noticia');
    }

    public function cargar(){
        $user = User:: find(auth()->user()->id);  
        $roles = $user->getRoleNames();
        $variable = 0;
        foreach ($roles as $rol) {
            if ($rol == 'Admin Blog' || $rol == 'Master'|| $rol == 'Aprobar Publicaciones') {
                $variable++;
                $this->emit('cargar_tabla', json_encode(Teaching::all()->toArray()));
            }
        }
        if ($variable == 0) {
            $this->emit('cargar_tabla', json_encode(Teaching::where('user_id', auth()->user()->id)->get()->toArray()));
        }
    }

    public function eliminar($id){
        $entrada = Teaching::find( $id );
    
        $entrada->delete();
        $this->cargar();
        $this->emit('eliminar_ok');
    }
}
