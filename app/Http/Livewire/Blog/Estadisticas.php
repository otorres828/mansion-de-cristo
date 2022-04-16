<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;

class Estadisticas extends Component
{
    public $hoy=null;
    
    public function mount(){
        $this->hoy=date('Y-m-d');

    }
    public function render()
    {
        return view('livewire.blog.estadisticas');
    }

    public function filtrar(){
        $this->paginas=obtenerPaginasVisitadasEnFecha($this->hoy);
    }
}
