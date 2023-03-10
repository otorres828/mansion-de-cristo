<?php

namespace App\Http\Controllers\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SecretaryController extends Controller
{
    public function index(){
        $discipulos_totales = User::find(auth()->user()->id)->descendantsAndSelf()->count()-1;
        $celulas_oficiales = count(auth()->user()->recursiveCelulasTodas);
        $celulas_evangelisticas = count(auth()->user()->recursiveEvangelisticasTodas);
        return view('secretary.index',compact('discipulos_totales','celulas_oficiales','celulas_evangelisticas'));
    }
}
