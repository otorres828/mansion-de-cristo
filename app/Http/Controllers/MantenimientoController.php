<?php

namespace App\Http\Controllers;

use App\Models\EmailSend;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function mantenimiento(){
        $modulo1 = EmailSend::where('name','MantenimientoCasa')->first(); //Mantenimiento Casa
        $modulo2 = EmailSend::where('name','MantenimientoNoticias')->first(); //Mantenimiento Casa
        $modulo3 = EmailSend::where('name','MantenimientoEnseñanzas')->first(); //Mantenimiento Casa
        $modulo4 = EmailSend::where('name','MantenimientoMinisterios')->first(); //Mantenimiento Casa
        $modulo5 = EmailSend::where('name','MantenimientoTestimonios')->first(); //Mantenimiento Casa
        $modulo6 = EmailSend::where('name','MantenimientoAcercade')->first(); //Mantenimiento Casa
        $modulo7 = EmailSend::where('name','MantenimientoContactanos')->first(); //Mantenimiento Casa
        $modulo8 = EmailSend::where('name','MantenimientoGeneral')->first(); //Mantenimiento Casa
        return view('admin.mantenimiento',compact('modulo1','modulo2','modulo3','modulo4','modulo5','modulo6','modulo7','modulo8'));
    }
}
