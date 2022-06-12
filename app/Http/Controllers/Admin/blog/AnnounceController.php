<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Http\Requests\AnnounceRequest;
use App\Models\EmailSend;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AnnounceController extends Controller
{    
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
        if($request->file('file')){
            $name = 'noticias/'.Str::random(20) .$request->file('file')->getClientOriginalName();
            $ruta =storage_path() . '/app/public/' . $name;
            Image::make($request->file('file'))->resize(600,400)->save($ruta);
         
            $nombre=Storage::putFileAs('imagenes/', asset('storage/'.$name),$name,'public'); 
            Storage::disk('public')->delete($name);
            $anuncio->image()->create([
                'url'=> $nombre
            ]);            
        }
        if($request->get('status')==2){
            $modulo1 = EmailSend::find(2);
            if($modulo1->status==2){
                Notification::route('mail',DB::table('users')->select('email')   
                                                 ->whereNotNull('email_verified_at')    
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
            $name = 'noticias/'.Str::random(20) .$request->file('file')->getClientOriginalName();
            $ruta =storage_path() . '/app/public/' . $name;
            Image::make($request->file('file'))->resize(600,400)->save($ruta);
         
            $nombre=Storage::putFileAs('imagenes/', asset('storage/'.$name),$name,'public'); 
            Storage::disk('public')->delete($name);
            if($anuncio->image){
                Storage::delete($anuncio->image->url);
                // Storage::delete($anuncio->image->url);
                $anuncio->image->update([
                    'url'=> $nombre
                ]);
            }else{
                $anuncio->image()->create([
                    'url'=> $nombre
                ]);  
            }
        }
      
        if($request->get('status')==2){
            $modulo1 = EmailSend::find(2);
            if($modulo1->status==2){
                Notification::route('mail',DB::table('users')->select('email')   
                                                 ->whereNotNull('email_verified_at')    
                                                ->get()
                                    )->notify(new EmailNotification($anuncio));     
            }
        }
        DB::update("UPDATE visitas set url='$urlnueva',pagina='$paginanueva' WHERE url='$urlvieja'");                           
        return redirect()->route('admin.blog.announce.index')->with('info','Se actualizo la Noticia');
    }

    public function destroy(Announce $anuncio)
    {
        $this->authorize('autor',$anuncio);
        DB::delete("DELETE FROM visitas where pagina='$anuncio->name'");
        //ELIMINAR IMAGEN ASOCIADA AL ANUNCIO
        if($anuncio->image){
            // Storage::delete($anuncio->image->url);
            Storage::disk('do_spaces')->delete($anuncio->image->url);
        }

        $anuncio->delete();
        return redirect()->route('admin.blog.announce.index')->with('delete','La noticia se elimino con exito');
    }
}
