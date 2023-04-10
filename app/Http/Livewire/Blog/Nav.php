<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use App\Models\EmailSend;

class Nav extends Component
{
    public $manNoticia,$manEnseñanza,$manMinisterio,$manTestimonio,$manAcercade,$manContactanos;

    public function render()
    {
        $this->manNoticia=Emailsend::find(5)->status;
        $this->manEnseñanza=Emailsend::find(6)->status;
        $this->manMinisterio=Emailsend::find(7)->status;
        $this->manTestimonio=Emailsend::find(8)->status;
        $this->manAcercade=Emailsend::find(9)->status;
        $this->manContactanos=Emailsend::find(10)->status;
        return view('components.aminblog.navigation');
    }
}
