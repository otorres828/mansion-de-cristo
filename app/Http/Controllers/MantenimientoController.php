<?php

namespace App\Http\Controllers;

use App\Models\EmailSend;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function mantenimiento(){
        $modulo1 = EmailSend::where('name','Mantenimiento')->first(); //Mantenimiento
        return view('admin.mantenimiento',compact('modulo1'));
    }
}
