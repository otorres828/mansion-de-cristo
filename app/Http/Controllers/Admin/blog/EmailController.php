<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\EmailSend;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    public function index()
    {
        $modulo1 = EmailSend::find(1); //ENSEÑANZAS
        $modulo2 = EmailSend::find(2); //NOTICIAS
        $modulo3 = EmailSend::find(3); //TESTIMONIOS
        return view('admin.blog.email.index',compact('modulo1', 'modulo2','modulo3'));
    }

}
