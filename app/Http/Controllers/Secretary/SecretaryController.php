<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Models\User;
use Illuminate\Http\Request;

class SecretaryController extends Controller
{
    public function index(){

        $decedants = User::find(auth()->user()->id)->descendantsAndSelf()->count()-1;
        return view('secretary.index',compact('decedants'));
    }
}
