<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SuscripcionController extends Controller
{
    public function suscribirse(Request $request){
        $validar =Http::get('https://api.getemail.io/v2/verif-email?api_key=MntLeNei8kRbN1iS63gS&email='.$request->email);
        sleep(8);
        if($validar['is_terminated']==true)
            return $validar['verif_email_status'];
    }
}
