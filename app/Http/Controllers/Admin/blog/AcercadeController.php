<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\Acercade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AcercadeController extends Controller
{

    public function index()
    {
        $acercades=Acercade::all();
        return view('admin.blog.acercade.index',compact('acercades'));

    }

    public function create()
    {
        return view('admin.blog.acercade.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'body'=>'required',
        ]);
        
        
        $acercade= Acercade::create($request->all());
        if($request->file('file')){
            $nombre = Str::random(20) .$request->file('file')->getClientOriginalName();
            $ruta =storage_path() . '/app/public/acercade/' . $nombre;
            Image::make($request->file('file'))->resize(600,400)->save($ruta);
            $acercade->image()->create([
                'url'=>'acercade/' . $nombre
            ]);            
        }
        
        return redirect()->route('admin.blog.acercade.index')->with('info','La informacion se creo con exito');
    }

    public function edit(Acercade $acercade)
    {
        return view('admin.blog.acercade.edit',compact('acercade'));    
    }


    public function update(Request $request, Acercade $acercade)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'body'=>'required',
        ]);
        $acercade->update($request->all());
        if($request->file('file')){ 
            $nombre = Str::random(20) .$request->file('file')->getClientOriginalName();
            $ruta =storage_path() . '/app/public/acercade/' . $nombre;
            Image::make($request->file('file'))->resize(600,400)->save($ruta);
            if($acercade->image){
                Storage::delete($acercade->image->url);
                $acercade->image->update([
                    'url'=>'acercade/' . $nombre
                ]);
            }else{
                $acercade->image()->create([
                    'url'=>'acercade/' . $nombre
                ]);  
            }
        }
      
        return redirect()->route('admin.blog.acercade.index')->with('info','Se actualizo la informacion');
    }

    public function destroy(Acercade $acercade)
    {
        //ELIMINAR IMAGEN ASOCIADA A LA INFORMACION
        if($acercade->image){
            Storage::delete($acercade->image->url);
        }
        $acercade->delete();
        return redirect()->route('admin.blog.acercade.index')->with('delete','La informacion se elimino con exito');
    }
}