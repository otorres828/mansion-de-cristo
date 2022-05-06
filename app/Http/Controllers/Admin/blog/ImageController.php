<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function upload(Request $request){
        // $nombre = Str::random(20) .$request->file('upload')->getClientOriginalName();
        // $ruta =storage_path() . '/app/public/ckeditor/' . $nombre;
        // Image::make($request->file('upload'))->save($ruta);    
        $nombre=Storage::put('public/ckeditor',$request->file('upload'));   
        return response()->json([
            'url'=>Storage::url($nombre)
        ]);
    }
}
