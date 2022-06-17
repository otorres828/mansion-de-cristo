<?php

namespace App\Http\Livewire\Blog;

use App\Models\Teaching as ModelsTeaching;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Teaching extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $search='todaslascategorias';
    public $autors='todoslosautores';

    public function render()
    {
        if($this->search=='todaslascategorias' && $this->autors=='todoslosautores'){

        $teachings = ModelsTeaching::where('status',2)->orderBy('id','desc')->paginate(6);
        }

        else if($this->search=='todaslascategorias' && $this->autors!='todoslosautores')
            $teachings = ModelsTeaching::where('status',2)->where('user_id',$this->autors)->orderBy('id','desc')->paginate(6);
        else if ($this->search!='todaslascategorias' && $this->autors!='todoslosautores')
            $teachings = ModelsTeaching::where('status',2)->where('user_id',$this->autors)->where('category_id',$this->search)->orderBy('id','desc')->paginate(6);
        else
            $teachings = ModelsTeaching::where('category_id',$this->search)->where('status',2)->orderBy('id','desc')->paginate(6);
        $categorias = DB::select("SELECT c.id,c.name
                                  FROM categories AS c, teachings AS t
                                  WHERE c.id=t.category_id
                                  GROUP BY c.id,c.name
                                  ORDER BY c.name");
       
        // $autores = User::role('Enseñanzas')->get(); 
        $autores = DB::select("SELECT u.id,u.name
                                FROM users AS u,teachings AS t
                                WHERE u.id=t.user_id
                                AND t.status='2'
                                GROUP BY u.id,u.name
                                ORDER BY u.name");
                                     
       
        return view('livewire.blog.teaching',compact('teachings','categorias','autores'));
    }

    public function filtro($category_id){
        $this->search=$category_id;
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


}
