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
         
        $nombre=Storage::putFileAs('imagenes', asset('storage/'.$name),$name,'public'); 
        Storage::disk('public')->delete($name);
        if ($objeto->image) {
            Storage::disk('do_spaces')->delete($objeto->image->url);
            // Storage::delete($teaching->image->url);
            $objeto->image->update([
                'url' =>$nombre
            ]);
        } else {
            $objeto->image()->create([
               'url' =>$nombre
            ]);
        }
    }
}