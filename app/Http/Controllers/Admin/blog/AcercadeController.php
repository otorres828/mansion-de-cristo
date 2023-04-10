<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\Acercade;
use App\Traits\TraitFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AcercadeController extends Controller
{
    use TraitFile;

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
        $acercade->name=ucwords($request->name);
        $acercade->save(); 
        if($request->file('file')){
            $this->cargar_imagen_insertar($request->file('file'),$acercade,'acercade'); 
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
        $acercade->name=ucwords($request->name);
        $acercade->save();
        if($request->file('file')){ 
            $this->cargar_imagen_actualizar($request->file('file'),$acercade,'acercade');
        }
      
        return redirect()->route('admin.blog.acercade.index')->with('info','Se actualizo la informacion');
    }

    public function destroy(Acercade $acercade)
    {
        //ELIMINAR IMAGEN ASOCIADA A LA INFORMACION
        if($acercade->image){
            $this->eliminar_imagen($acercade);      
        }
        $acercade->delete();
        return redirect()->route('admin.blog.acercade.index')->with('delete','La informacion se elimino con exito');
    }
}
