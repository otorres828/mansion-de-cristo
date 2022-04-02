<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Http\Requests\AnnounceRequest;
use App\Models\User;
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
            // $anuncios = Announce::select('id','name','slug','status')
            //                 ->where('user_id',auth()->user()->id)
            //                 ->latest('id')
            //                 ->get(); 
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
         $nombre = Str::random(20) .$request->file('file')->getClientOriginalName();
          $ruta =storage_path() . '/app/public/announces/' . $nombre;
        Image::make($request->file('file'))->resize(600,400)->save($ruta);

        $anuncio= Announce::create($request->all());
        if($request->file('file')){
            //$image_url=Storage::put('public/announces', $request->file('file'));
            $anuncio->image()->create([
                'url'=>'announces/' . $nombre
            ]);            
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
            //$url=Storage::put('public/announces', $request->file('file'));    
            $nombre = Str::random(20) .$request->file('file')->getClientOriginalName();
            $ruta =storage_path() . '/app/public/announces/' . $nombre;
            Image::make($request->file('file'))->resize(600,400)->save($ruta);
            if($anuncio->image){
                Storage::delete($anuncio->image->url);
                $anuncio->image->update([
                    'url'=>'announces/' . $nombre
                ]);
            }else{
                $anuncio->image()->create([
                    'url'=>'announces/' . $nombre
                ]);  
            }
        }
        return redirect()->route('admin.blog.announce.edit',$anuncio)->with('info','Se actualizo el Anuncio');
    }


    public function destroy(Announce $anuncio)
    {
        $this->authorize('autor',$anuncio);

        //ELIMINAR IMAGEN ASOCIADA AL ANUNCIO
        if($anuncio->image){
            Storage::delete($anuncio->image->url);
        }

        $anuncio->delete();
        return redirect()->route('admin.blog.announce.index')->with('delete','El anuncio se elimino con exito');
    }
}
