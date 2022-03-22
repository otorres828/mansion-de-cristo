<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.blog.contact.index',compact('contacts'));
    }


    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect()->route('admin.blog.contact.index')->with('info','Se actualizo el estado del mensaje');
    }

    public function show(Contact $contact)
    {
        return view('admin.blog.contact.show',compact('contact'));
    }

   

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.blog.contact.index')->with('delete','El mensaje se elimino con exito');;
    }
}
