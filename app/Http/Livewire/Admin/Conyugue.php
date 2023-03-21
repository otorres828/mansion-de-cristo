<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Conyugue extends Component
{
    public $conyugue=null;
    
    public function render()
    {
        $user=auth()->user();
        if ($user->conyugue) {
            $this->conyugue=User::find($user->conyugue);
        }
        return view('livewire.admin.conyugue');
    }
}
