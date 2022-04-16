<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;

class Estadisticas extends Component
{
    public $hoy;
    public $paginas;

    public function mount($hoy){
        $this->hoy=$hoy;
        $this->paginas=obtenerPaginasVisitadasEnFecha($hoy);
    }
    public function render()
    {
        return view('livewire.blog.estadisticas');
    }

    public function updatedHoy(){
        $this->paginas=obtenerPaginasVisitadasEnFecha($this->hoy);
    }
}
