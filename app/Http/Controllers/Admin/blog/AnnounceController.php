<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Http\Requests\AnnounceRequest;
use App\Models\EmailSend;
use App\Models\User;
use App\Notifications\EmailNotification;
use App\Traits\TraitFile;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AnnounceController extends Controller
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
                $anuncios = Announce::all();
            }
        }
        if ($variable == 0) {
            $anuncios = Announce::where('user_id', auth()->user()->id)
                ->get();
        }
        return view('admin.blog.announce.index',compact('anuncios'));
    }
  
    public function create()
    {
        return view('admin.blog.announce.create');
    }

    public function store(AnnounceRequest $request)
    {
        $anuncio= Announce::create($request->all());
        $anuncio->name=ucwords($request->name);
        $anuncio->save(); 
        if($request->file('file')){
            $this->cargar_imagen_insertar($request->file('file'),$anuncio,'noticias'); 
        }
        if($request->get('status')==2){
            $modulo1 = EmailSend::find(2);
            if($modulo1->status==2){
                Notification::route('mail',DB::table('enviar_correos')->select('correo') 
                                                //  ->whereNotNull('email_verified_at')    
                                                ->get()
                                    )->notify(new EmailNotification($anuncio));     
            }
        }
        return redirect()->route('admin.blog.announce.index')->with('info','El anuncio se creo con exito');
    }
  
    public function edit(Announce $anuncio)
    {
        $this->authorize('autor',$anuncio);
        return view('admin.blog.announce.edit',compact('anuncio'));
    }

    public function update(AnnounceRequest $request, Announce $anuncio)
    {   
        $this->authorize('autor',$anuncio);

        $urlvieja=route('blog.show_announces',$anuncio);
        $anuncio->update($request->all());
        $urlnueva=route('blog.show_announces',$anuncio);
        $paginanueva=$anuncio->name; 
        
        if($request->file('file')){ 
            $this->cargar_imagen_actualizar($request->file('file'),$anuncio,'noticias');
        }
      
        if($request->get('status')==2){
            $modulo1 = EmailSend::find(2);
            if($modulo1->status==2){
                try{
                    DB::update("UPDATE visitas set url='$urlnueva',pagina='$paginanueva' WHERE url='$urlvieja'");                           
                    Notification::route('mail',DB::table('enviar_correos')->select('email') 
                                                    //  ->whereNotNull('email_verified_at')    
                                                    ->get()
                                        )->notify(new EmailNotification($anuncio));     

                }catch(Exception $e){
                    return redirect()->route('admin.blog.announce.index')->with('delete','se ha actualizado el anuncio pero ha ocurrido un error en el envio de los correos. El mensaje fue el siguiente: '.$e);
                }
            }
        }
        return redirect()->route('admin.blog.announce.index')->with('info','Se actualizo la Noticia');
    }

    public function destroy(Announce $anuncio)
    {
        $this->authorize('autor',$anuncio);
        DB::delete("DELETE FROM visitas where pagina='$anuncio->name'");
        //ELIMINAR IMAGEN ASOCIADA AL ANUNCIO
        if($anuncio->image){
            $this->eliminar_imagen($anuncio);
        }

        $anuncio->delete();
        return redirect()->route('admin.blog.announce.index')->with('delete','La noticia se elimino con exito');
    }
}
