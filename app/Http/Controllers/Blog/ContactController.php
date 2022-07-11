<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Acercade;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function acercade(){
        $acercade=Acercade::where('status',2)->orderBy('id', 'ASC')->get();
        return view('blog.acercade',compact('acercade'));
    }

    public function index(){
        return view('blog.contactanos');
    }

    public function store(ContactRequest $request)
    {
        $fecha = date("Y-m-d");
        $ip = $_SERVER["REMOTE_ADDR"] ?? "";
        $consulta = Contact::where('ip',$ip)->where('fecha',$fecha)->get();
        if($consulta->count() > 0)
            return redirect()->route('blog.contact')->with('failer','Lo sentimos, no puede enviar mas de un mensaje el mismo dia. Debe de esperar 24 horas para volver a enviar un mensaje');    
        Contact::create(['name'=>$request->name,
                         'email'=>$request->email,
                         'title' =>$request->title,
                         'description'=>$request->description,
                         'ip'=>$ip,
                         'fecha'=>$fecha
                        ]);  
        return redirect()->route('blog.contact')->with('info','Se envio el mensaje con exito');    
    }    


}