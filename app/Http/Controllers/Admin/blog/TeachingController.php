<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeachingRequest;
use App\Models\Category;
use App\Models\EmailSend;
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
        if ($request->file('file')) {
            $image_url=Storage::disk('do_spaces',)->put('imagenes/enseñanzas', $request->file('file'),'public'); 
            $teaching->image()->create([
                'url' =>$image_url
            ]);
        }
        if($request->get('status')==2){
            $modulo1 = EmailSend::find(1);
            if($modulo1->status==2){
                Notification::route('mail',DB::table('users')->select('email') 
                                                ->whereNotNull('email_verified_at')     
                                                ->get()
                                    )->notify(new EmailNotification($teaching));     
            }
        }
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

        $urlvieja=route('blog.show_teaching',$teaching);
        $teaching->update($request->all());
        $urlnueva=route('blog.show_teaching',$teaching);
        $paginanueva=$teaching->name;
        
        if ($request->file('file')) {
            $image_url=Storage::disk('do_spaces',)->put('imagenes/enseñanzas', $request->file('file'),'public'); 

            if ($teaching->image) {
                Storage::disk('do_spaces')->delete($teaching->image->url);

                $teaching->image->update([
                    'url' =>$image_url
                ]);
            } else {
                $teaching->image()->create([
                    'url' =>$image_url
                ]);
            }
        }   
        if($request->get('status')==2){
            $modulo1 = EmailSend::find(1);
            if($modulo1->status==2){
                Notification::route('mail',DB::table('users')->select('email') 
                                                ->whereNotNull('email_verified_at')     
                                                ->get()
                                    )->notify(new EmailNotification($teaching));     
            }
        }
        DB::update("UPDATE visitas set url='$urlnueva',pagina='$paginanueva' WHERE url='$urlvieja'");                           
        return redirect()->route('admin.blog.teaching.edit', $teaching)->with('info', 'Se actualizo la informacion de la Enseñanza');
    }

    public function destroy(Teaching $teaching)
    {
        $this->authorize('autor', $teaching);
        DB::delete("DELETE FROM visitas where pagina='$teaching->name'");
        if($teaching->image){
            Storage::disk('do_spaces')->delete($teaching->image->url);        
        }
        $teaching->delete();
        return redirect()->route('admin.blog.teaching.index')->with('delete', 'La enseñanza se elimino con exito');;
    }
}
