<?php

namespace App\Http\Livewire\Admin;

use App\Models\Crecimiento as ModelsCrecimiento;
use Livewire\Component;

class Crecimiento extends Component
{
    public function render()
    {
        $crecimientos = ModelsCrecimiento::where('status',2)->get();
        return view('livewire.admin.crecimiento',compact('crecimientos'));
    }

    public function cambiar_estatus($id){
        $crecimiento=ModelsCrecimiento::find($id);
        if($crecimiento->completado)
        $crecimiento->users()->detach(auth()->user()->id);
        else
        $crecimiento->users()->attach(auth()->user()->id);

    }
}
