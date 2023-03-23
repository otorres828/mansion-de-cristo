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
        $user=auth()->user();
        if ($user->mi_conyugue && $user->mi_conyugue->genero=='H') {
            $celulas_oficiales = count($user->mi_conyugue->recursiveCelulasTodas);
            $discipulos_totales = User::find($user->mi_conyugue->id)->descendantsAndSelf()->count()-1;
            $celulas_evangelisticas = count($user->mi_conyugue->recursiveEvangelisticasTodas);
        }else{
            $discipulos_totales = User::find($user->id)->descendantsAndSelf()->count()-1;
            $celulas_oficiales = count($user->recursiveCelulasTodas);
            $celulas_evangelisticas = count($user->recursiveEvangelisticasTodas);

        }
        return view('secretary.index',compact('discipulos_totales','celulas_oficiales','celulas_evangelisticas'));
    }
}
