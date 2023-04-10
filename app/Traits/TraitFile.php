<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


trait TraitFile {

    public function cargar_imagen_actualizar($file,Object $objeto,$nombre){
        $name = $nombre.'/'.Str::random(30).'.' .$file->getClientOriginalExtension();
        $ruta =storage_path() . '/app/public/' . $name;
        Image::make($file)->resize(1200,800)->save($ruta);
         
        if(env('APP_ENV')!='local'){
            $nombre=Storage::putFileAs('imagenes', asset('storage/'.$name),$name,'public'); 
            Storage::disk('public')->delete($name);
        }
        if ($objeto->image) {
            if(env('APP_ENV')!='local')
                Storage::disk('do_spaces')->delete($objeto->image->url);
            else
                Storage::disk('public')->delete($objeto->image->url);

            $objeto->image->update([
                'url' => env('APP_ENV')=='local' ? $name : $nombre
            ]);
        } else {
            $objeto->image()->create([
               'url' => env('APP_ENV')=='local' ? $name : $nombre
            ]);
        }
    }

    public function cargar_imagen_insertar($file,Object $objeto,$nombre){
        $name = $nombre.'/'.Str::random(30).'.' .$file->getClientOriginalExtension();
        $ruta =storage_path() . '/app/public/' . $name;
        Image::make($file)->resize(1200,800)->save($ruta);
     
        if(env('APP_ENV')!='local'){
            $nombre=Storage::putFileAs('imagenes', asset('storage/'.$name),$name,'public'); 
            Storage::disk('public')->delete($name);
        }
        $objeto->image()->create([
            'url' => env('APP_ENV')=='local' ? $name : $nombre
        ]);
    }

}