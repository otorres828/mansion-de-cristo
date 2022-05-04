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
        $acercade=Acercade::where('status',2)->get();
        return view('blog.acercade',compact('acercade'));
    }

    public function index(){
        return view('blog.contactanos');
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->all());  
        return redirect()->route('blog.contact.index')->with('info','Se envio el mensaje con exito');    
    }    


}