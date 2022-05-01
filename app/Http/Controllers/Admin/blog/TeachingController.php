<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeachingRequest;
use App\Mail\TeachingMailable;
use App\Models\Category;
use App\Models\Teaching;
use App\Models\User;
use App\Notifications\TeachingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
            if ($rol == 'Admin Blog' || $rol == 'Aprobar Publicaciones'|| $rol == 'Aprobar Publicaciones') {
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
        $categorias = Category::pluck('name', 'id');
        return view('admin.blog.teaching.create', compact('categorias'));
    }

    public function store(TeachingRequest $request)
    {
        
        $nombre = Str::random(20) . $request->file('file')->getClientOriginalName();
        $ruta = storage_path() . '/app/public/teachings/' . $nombre;
        Image::make($request->file('file'))->resize(600, 400)->save($ruta);

        $teaching = Teaching::create($request->all());

        if ($request->file('file')) {
            //$image_url=Storage::put('public/teachings', $request->file('file'));

            $teaching->image()->create([
                'url' => 'teachings/' . $nombre
            ]);
        }
        if($request->status==2){
            Notification::route('mail',DB::table('users')->select('email')->get())->notify(new TeachingNotification($teaching));     
        }
        return redirect()->route('admin.blog.teaching.index')->with('info', 'Se creo la enseñanza con exito');;
    }

    public function edit(Teaching $teaching)
    {
        $this->authorize('autor', $teaching);
        $categorias = Category::pluck('name', 'id');

        return view('admin.blog.teaching.edit', compact('teaching', 'categorias'));
    }


    public function update(TeachingRequest $request, Teaching $teaching)
    {
        $this->authorize('autor', $teaching);
        $teaching->update($request->all());
        if ($request->file('file')) {
            //$url=Storage::put('public/teachings', $request->file('file'));

            $nombre = Str::random(20) . $request->file('file')->getClientOriginalName();
            $ruta = storage_path() . '/app/public/teachings/' . $nombre;
            Image::make($request->file('file'))->resize(600, 400)->save($ruta);

            if ($teaching->image) {
                Storage::delete($teaching->image->url);

                $teaching->image->update([
                    'url' => 'teachings/' . $nombre
                ]);
            } else {
                $teaching->image()->create([
                    'url' => 'teachings/' . $nombre
                ]);
            }
        }   
        Notification::route('mail',DB::table('users')->select('email')->get())->notify(new TeachingNotification($teaching));     
        return redirect()->route('admin.blog.teaching.edit', $teaching)->with('info', 'Se actualizo la informacion de la Enseñanza');
    }


    public function destroy(Teaching $teaching)
    {
        $this->authorize('autor', $teaching);

        $teaching->delete();
        return redirect()->route('admin.blog.teaching.index')->with('delete', 'La enseñanza se elimino con exito');;
    }
}
