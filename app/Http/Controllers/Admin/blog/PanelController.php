<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index(){
        $user = User:: find(auth()->user()->id);  
        $roles = $user->getRoleNames(); 
        return view('admin/blog/panel',compact('user', 'roles'));
    }
}
