<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\EmailSend;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    public function index()
    {   
        $modulo1 = EmailSend::where('name','Enseñanzas')->first(); //ENSEÑANZAS
        $modulo2 = EmailSend::where('name','Noticias')->first(); //NOTICIAS
        $modulo3 = EmailSend::where('name','Testimonios')->first(); //TESTIMONIOS
        return view('admin.blog.email.index',compact('modulo1', 'modulo2','modulo3'));
    }

}
