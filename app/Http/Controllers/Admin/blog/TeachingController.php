<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeachingRequest;
use App\Models\Category;
use App\Models\EmailSend;
use App\Models\ImageCkeditor;
use App\Models\Teaching;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class TeachingController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $roles = $user->getRoleNames();
        $variable = 0;
        foreach ($roles as $rol) {
            if ($rol == 'Admin Blog' || $rol == 'Master'|| $rol == 'Aprobar Publicaciones') {
                $variable++;
                $teachings = Teaching::all();
            }
        }
        if ($variable == 0) {
            $teachings = Teaching::where('user_id', auth()->user()->id)
                ->get();
        }
        $this->limpiar_storage();

        return view('admin.blog.teaching.index', compact('teachings'));
    }

    public function create()
    {
        $user = User::find(auth()->user()->id);
        $roles = $user->getRoleNames();
        $variable = 0;
        foreach ($roles as $rol) {
            if ($rol == 'Admin Blog' ||  $rol=='Master' || $rol=='Aprobar Publicaciones') {
                $variable++;
                $autores=User::orderBy('name','asc')->pluck('name', 'id');
            }
        }
        $categorias = Category::orderBy('name','asc')->pluck('name', 'id');
        if ($variable == 0) {
            return view('admin.blog.teaching.create', compact('categorias'));
        }else{
            return view('admin.blog.teaching.create', compact('categorias','autores'));
        }
    }

    public function store(TeachingRequest $request)
    {      
        $teaching = Teaching::create($request->all());
        $teaching->name=ucwords($request->name);
        $teaching->save();      
        if ($request->file('file')) {
            $name = 'enseñanzas/'.Str::random(30).'.' .$request->file('file')->getClientOriginalExtension();
            $ruta =storage_path() . '/app/public/' . $name;
            Image::make($request->file('file'))->resize(1200,800)->save($ruta);
         
            $nombre=Storage::putFileAs('imagenes', asset('storage/'.$name),$name,'public'); 
            Storage::disk('public')->delete($name);
            $teaching->image()->create([
                'url' =>$nombre
            ]);
        }
        if($request->get('status')==2){
            $modulo1 = EmailSend::find(1);
            if($modulo1->status==2){
                Notification::route('mail',DB::table('enviar_correos')->select('email') 
                                                // ->whereNotNull('email_verified_at')     
                                                ->get()
                                    )->notify(new EmailNotification($teaching));     
            }
        }

        $this->insertar($request,$teaching);

        return redirect()->route('admin.blog.teaching.index')->with('info', 'Se creo la enseñanza con exito');;
    }

    public function edit(Teaching $teaching)
    {
        $this->authorize('autor', $teaching);
        $user = User::find(auth()->user()->id);
        $roles = $user->getRoleNames();
        $variable = 0;
        foreach ($roles as $rol) {
            if ($rol == 'Admin Blog' ||  $rol=='Master' || $rol=='Aprobar Publicaciones') {
                $variable++;
                $autores=User::orderBy('name','asc')->pluck('name', 'id');
            }
        }
        $categorias = Category::orderBy('name','asc')->pluck('name', 'id');
        if ($variable == 0) {
            return view('admin.blog.teaching.edit', compact('teaching', 'categorias'));
        }else{
            return view('admin.blog.teaching.edit', compact('teaching', 'categorias','autores'));
        }
    }

    public function update(TeachingRequest $request, Teaching $teaching)
    {
        $this->authorize('autor', $teaching);

        $urlvieja=route('blog.show_teaching',[$teaching->slug,$teaching->id]);
        $teaching->update($request->all());
        $teaching->name=ucwords($request->name);
        $teaching->save();  
        $urlnueva=route('blog.show_teaching',[$teaching->slug,$teaching->id]);
        $paginanueva=$teaching->name;
        
        if ($request->file('file')) {
            $name = 'enseñanzas/'.Str::random(30).'.' .$request->file('file')->getClientOriginalExtension();
            $ruta =storage_path() . '/app/public/' . $name;
            Image::make($request->file('file'))->resize(1200,800)->save($ruta);
         
            $nombre=Storage::putFileAs('imagenes', asset('storage/'.$name),$name,'public'); 
            Storage::disk('public')->delete($name);
            if ($teaching->image) {
                Storage::disk('do_spaces')->delete($teaching->image->url);
                // Storage::delete($teaching->image->url);
                $teaching->image->update([
                    'url' =>$nombre
                ]);
            } else {
                $teaching->image()->create([
                    'url' =>$nombre
                ]);
            }
        }   
        if($request->get('status')==2){ 
           
            $modulo1 = EmailSend::find(1);
            if($modulo1->status==2){
                Notification::route('mail',DB::table('enviar_correos')->select('email') 
                                                ->get()
                                    )->notify(new EmailNotification($teaching));     
            }
        }
        DB::update("UPDATE visitas set url='$urlnueva',pagina='$paginanueva' WHERE url='$urlvieja'");    
        
        $this->modificar($request,$teaching);
        
        return redirect()->route('admin.blog.teaching.index')->with('info', 'Se actualizo la informacion de la Enseñanza');
        // return redirect()->route('admin.blog.teaching.edit', $teaching)->with('info', 'Se actualizo la informacion de la Enseñanza');
    }

    public function destroy(Teaching $teaching)
    {
        $this->authorize('autor', $teaching);
        DB::delete("DELETE FROM visitas where pagina='$teaching->name'");
        if($teaching->image){
            // Storage::delete($teaching->image->url);
            Storage::disk('do_spaces')->delete($teaching->image->url);        
        }
        $teaching->delete();
        return redirect()->route('admin.blog.teaching.index')->with('delete', 'La enseñanza se elimino con exito');;
    }

    public function insertar($request,$teaching){
        $data = $request->validated();
        $re_extractImages = '/src=["\']([^ ^"^\']*)["\']/ims';
        preg_match_all($re_extractImages,$data['body'],$matches);
        $images=$matches[1];

        foreach($images as $image){
        $image_url=pathinfo($image,PATHINFO_BASENAME);
           $teaching->ckeditor_images()->create([
                'img_url'=>$image_url
            ]);
        }
    }

    public function modificar($request,$teaching){
        $data = $request->validated();
        $re_extractImages = '/src=["\']([^ ^"^\']*)["\']/ims';
        preg_match_all($re_extractImages,$data['body'],$matches);
        $imagenes_nuevas= $matches[1];

        if($teaching->ckeditor_images){
            $imagenes_antiguas=$teaching->ckeditor_images
                                            ->pluck('img_url')
                                            ->toArray();
        }else{
            $imagenes_antiguas=[]; 
        }
                                    
        foreach($imagenes_nuevas as $image){
            $image_url=pathinfo($image,PATHINFO_BASENAME);
            $clave=array_search($image_url,$imagenes_antiguas);
            if($clave === false){
                $teaching->ckeditor_images()->create([
                    'img_url'=>$image_url
                ]);
            }else{
                unset($imagenes_antiguas[$clave]);
            }
        }

        foreach($imagenes_antiguas as $imagenes){
            Storage::disk('ckeditor')->delete('/'.$imagenes);
            $teaching->ckeditor_images()->where('img_url',$imagenes)->delete();
        }
    }

    public function limpiar_storage(){
        $files =Storage::disk('ckeditor')->files('/'); //blog/ckeditor/xasdsfsdfs
        $images = ImageCkeditor::pluck('img_url')->toArray();      //asdasdasd.png
        $array_nuevo = array_map('basename', $files);             //quita el blog/ckeditor

        $eliminar=array_diff($array_nuevo,$images);
        foreach ($eliminar as $key => $value) {
            Storage::disk('ckeditor')->delete('/'.$eliminar[$key]);
        }
    }
}
