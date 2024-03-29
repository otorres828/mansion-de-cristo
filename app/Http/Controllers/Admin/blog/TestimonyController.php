<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\EmailSend;
use App\Http\Requests\TestimonyRequest;
use App\Models\Testimony;
use App\Models\User;
use App\Notifications\EmailNotification;
use App\Traits\TraitFile;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class TestimonyController extends Controller
{
    use TraitFile;
   
    public function index()
    {
        $user = User:: find(auth()->user()->id);  
        $roles = $user->getRoleNames();
        $variable = 0;
        foreach ($roles as $rol) {
            if ($rol == 'Admin Blog' || $rol == 'Master'|| $rol == 'Aprobar Publicaciones') {
                $variable++;
                $testimonies = Testimony::all();
            }
        }
        if ($variable == 0) {
            $testimonies = Testimony::where('user_id', auth()->user()->id)
                ->get();
        }                         
        return view('admin.blog.testimony.index',compact('testimonies'));    
    }

    public function create()
    {
        return view('admin.blog.testimony.create');
    }

    public function store(TestimonyRequest $request)
    {
        $testimony= Testimony::create($request->all());
        $testimony->name=ucwords($request->name);
        $testimony->save(); 
        if($request->file('file')){
            $this->cargar_imagen_insertar($request->file('file'),$testimony,'testimonios'); 
        }
        if($request->get('status')==2){
            $modulo3 = EmailSend::find(2);
            if($modulo3->status==2){
                Notification::route('mail',DB::table('enviar_correos')->select('correo') 
                                                // ->whereNotNull('email_verified_at')    
                                                ->get()
                                    )->notify(new EmailNotification($testimony));   
            }  
        }

        return redirect()->route('admin.blog.testimony.index')->with('info','El testimonio se creo con exito');    
    }

    public function edit(Testimony $testimony)
    {
        $this->authorize('autor',$testimony);
        return view('admin.blog.testimony.edit',compact('testimony'));
    }

    public function update(TestimonyRequest $request, Testimony $testimony)
    {
        $this->authorize('autor',$testimony);

        $urlvieja=route('blog.show_testimony',$testimony);
        $testimony->update($request->all());
        $testimony->name=ucwords($request->name);
        $testimony->save(); 
        $urlnueva=route('blog.show_testimony',$testimony);
        $paginanueva=$testimony->name;

        if($request->file('file')){
            $this->cargar_imagen_actualizar($request->file('file'),$testimony,'testimonios');

        }
        if($request->get('status')==2){
            $modulo3 = EmailSend::find(2);
            if($modulo3->status==2){
                Notification::route('mail',DB::table('enviar_correos')->select('correo') 
                                                // ->whereNotNull('email_verified_at')    
                                                ->get()
                                    )->notify(new EmailNotification($testimony));   
            }  
        }
        DB::update("UPDATE visitas set url='$urlnueva',pagina='$paginanueva' WHERE url='$urlvieja'");                           
        return redirect()->route('admin.blog.testimony.index')->with('info','Se actualizo la informacion del Testimony');
    }

    public function destroy(Testimony $testimony)
    {
        $this->authorize('autor',$testimony);
        DB::delete("DELETE FROM visitas where pagina='$testimony->name'");
        if($testimony->image){
            $this->eliminar_imagen($testimony);
        }
        $testimony->delete();
        return redirect()->route('admin.blog.testimony.index')->with('delete','El testimonio se elimino con exito');;
    }
}
