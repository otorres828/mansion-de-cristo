<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\MinistryRequest;
use App\Models\Ministry;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class MinistryController extends Controller
{
    
    public function index()
    {
        $user = User:: find(auth()->user()->id);  
        $roles = $user->getRoleNames();
        $variable = 0;
        foreach ($roles as $rol) {
            if ($rol == 'Admin Blog' || $rol == 'Master'|| $rol == 'Aprobar Publicaciones') {
                $variable++;
                $ministries = Ministry::all();
            }
        }
        if ($variable == 0) {
            $ministries = Ministry::where('user_id', auth()->user()->id)
                ->get();
        }                     
        return view('admin.blog.ministry.index',compact('ministries'));    
    }

   
    public function create()
    {
        return view('admin.blog.ministry.create');
    }

    public function store(MinistryRequest $request)
    {
        $ministry= Ministry::create($request->all());
        if($request->file('file')){
            $name = 'ministerios/'.Str::random(20) .$request->file('file')->getClientOriginalName();
            $ruta =storage_path() . '/app/public/' . $name;
            Image::make($request->file('file'))->resize(600,400)->save($ruta);
         
            $nombre=Storage::putFileAs('imagenes/', asset('storage/'.$name),$name,'public'); 
            Storage::disk('public')->delete($name);
            $ministry->image()->create([
                'url'=> $nombre
            ]);            
        }
        return redirect()->route('admin.blog.ministry.index')->with('info','El anuncio se creo con exito');    
    }

    public function edit(Ministry $ministry)
    {

        $this->authorize('autor',$ministry);
        return view('admin.blog.ministry.edit',compact('ministry'));
    }
 
    public function update(MinistryRequest $request, Ministry $ministry)
    {
        $this->authorize('autor',$ministry);

        $urlvieja=route('blog.show_ministery',$ministry);
        $ministry->update($request->all());
        $urlnueva=route('blog.show_ministery',$ministry);
        $paginanueva=$ministry->name;

        if($request->file('file')){
            $name = 'ministerios/'.Str::random(20) .$request->file('file')->getClientOriginalName();
            $ruta =storage_path() . '/app/public/' . $name;
            Image::make($request->file('file'))->resize(600,400)->save($ruta);
         
            $nombre=Storage::putFileAs('imagenes/', asset('storage/'.$name),$name,'public'); 
            Storage::disk('public')->delete($name);
            if($ministry->image){
                // Storage::delete($ministry->image->url);
                Storage::disk('do_spaces')->delete($ministry->image->url);
                $ministry->image->update([
                    'url'=> $nombre
                ]);
            }else{
                $ministry->image()->create([
                    'url'=> $nombre
                ]);  
            }
        }
        DB::update("UPDATE visitas set url='$urlnueva',pagina='$paginanueva' WHERE url='$urlvieja'");                           
        return redirect()->route('admin.blog.ministry.index')->with('info','Se actualizo la informacion del Ministerio o Departamento');
    }
  
    public function destroy(Ministry $ministry)
    {
        $this->authorize('autor',$ministry);
        DB::delete("DELETE FROM visitas where pagina='$ministry->name'");

        if($ministry->image){
            Storage::disk('do_spaces')->delete($ministry->image->url); 
            // Storage::delete($ministry->image->url);
        }
        $ministry->delete();
        return redirect()->route('admin.blog.ministry.index')->with('delete','El ministerio o departamento se elimino con exito');;
    }
}
