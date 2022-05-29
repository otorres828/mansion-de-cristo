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
        if($roles[0]=='Admin Blog' || $roles[0]=='Master'|| $roles[0]=='Aprobar Publicaciones'){
            $anuncios = Announce::select('id','name','slug','status','user_id')
            ->latest('id')
            ->get();  
        }else{ 
            $anuncios = User::find(auth()->user()->id)->announce()
                            ->select('id','name','slug','status')
                            ->latest('id')
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
            // $nombre = Str::random(20) .$request->file('file')->getClientOriginalName();
            // $ruta =storage_path() . '/app/public/announces/' . $nombre;
            // Image::make($request->file('file'))->resize(600,400)->save($ruta);
            $image_url=Storage::disk('do_spaces',)->put('imagenes/noticias', $request->file('file'),'public'); 
            $anuncio->image()->create([
                // 'url'=>'announces/' . $nombre
                'url'=> $image_url
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
        $anuncio->update($request->all());
        
        if($request->file('file')){  
            $image_url=Storage::disk('do_spaces',)->put('imagenes/noticias', $request->file('file'),'public'); 

            if($anuncio->image){
                Storage::disk('do_spaces')->delete($anuncio->image->url);
                $anuncio->image->update([
                    'url'=> $image_url
                ]);
            }else{
                $anuncio->image()->create([
                    'url'=> $image_url
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
        return redirect()->route('admin.blog.announce.edit',$anuncio)->with('info','Se actualizo la Noticia');
    }


    public function destroy(Announce $anuncio)
    {
        $this->authorize('autor',$anuncio);
        //ELIMINAR IMAGEN ASOCIADA AL ANUNCIO
        if($anuncio->image){
            // Storage::delete($anuncio->image->url);
            Storage::disk('do_spaces')->delete($anuncio->image->url);
        }

        $anuncio->delete();
        return redirect()->route('admin.blog.announce.index')->with('delete','La noticia se elimino con exito');
    }
}
