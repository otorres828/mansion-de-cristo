<?php

namespace App\Http\Livewire\Blog;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Estadisticas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $inicio,$fin;
    public $buscar;
    public $cosa=1;
    private $paginas,$visitasYVisitantes;

    public function mount($hoy){
        $this->inicio=$hoy;
        $this->fin=$hoy;
    }
    public function render()
    {
        $this->paginas=obtenerPaginasVisitadasEnFecha($this->inicio,$this->fin,$this->buscar);
        $this->visitasYVisitantes= obtenerConteoVisitasYVisitantesEnRango($this->inicio,$this->fin);
        return view('livewire.blog.estadisticas',[
                                                'paginas'=>$this->paginas,
                                                'visitasYVisitantes'=>$this->visitasYVisitantes
                                                ]);
    }
    
    public function eliminar($pagina){
        $this->cosa++;
        DB::select("DELETE FROM visitas WHERE pagina='$pagina'");
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

}
