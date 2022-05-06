<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonyRequest;
use App\Models\Testimony;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class TestimonyController extends Controller
{
   
    public function index()
    {
        $user = User:: find(auth()->user()->id);  
        $roles = $user->getRoleNames();
        if($roles[0]=='Admin Blog' ||  $roles[0]=='Master'|| $roles[0]=='Aprobar Publicaciones'){
            $testimonies = Testimony::select('id','autor','name','slug','status')
                            ->latest('id')
                            ->get();
        }else{
            $testimonies = Testimony::select('id','autor','name','slug','status')
                            ->where('user_id',auth()->user()->id)
                            ->latest('id')
                            ->get();            
        }                       
        return view('admin.blog.testimony.index',compact('testimonies'));    
    }


    public function create()
    {
        return view('admin.blog.testimony.create');
    }


 
    public function store(TestimonyRequest $request)
    {
        $nombre = Str::random(20) .$request->file('file')->getClientOriginalName();
        $ruta =storage_path() . '/app/public/testimonies/' . $nombre;
        Image::make($request->file('file'))->resize(600,400)->save($ruta);
        $testimony= Testimony::create($request->all());
        if($request->file('file')){
            //$image_url=Storage::put('public/testimonies', $request->file('file'));
            $testimony->image()->create([
                'url'=>'testimonies/' .$nombre
            ]);            
        }
        if($request->get('status')==2){
            Notification::route('mail',DB::table('users')->select('email')   
                                             ->whereNotNull('email_verified_at')    
                                            ->get()
                                )->notify(new EmailNotification($testimony));     
        }
        return redirect()->route('admin.blog.testimony.index')->with('info','El testimonio se creo con exito');    
    }


    public function edit(Testimony $testimony)
    {

        $this->authorize('autor',$testimony);
        return view('admin.blog.testimony.edit',compact('testimony'));
    }


    public function update(TestimonyRequest $request, Testimony $testimony)
    {
        $this->authorize('autor',$testimony);
        $testimony->update($request->all());

        if($request->file('file')){
            //$url=Storage::put('public/testimonies', $request->file('file'));
            $nombre = Str::random(20) .$request->file('file')->getClientOriginalName();
            $ruta =storage_path() . '/app/public/testimonies/' . $nombre;
            Image::make($request->file('file'))->resize(600,400)->save($ruta);
            
            if($testimony->image){
                Storage::delete($testimony->image->url);
    
                $testimony->image->update([
                    'url'=>'testimonies/' .$nombre
                ]);
            }else{
                $testimony->image()->create([
                    'url'=>'testimonies/' .$nombre
                ]);  
            }
        }
        if($request->get('status')==2){
            Notification::route('mail',DB::table('users')->select('email')   
                                             ->whereNotNull('email_verified_at')    
                                            ->get()
                                )->notify(new EmailNotification($testimony));     
        }
        return redirect()->route('admin.blog.testimony.edit',$testimony)->with('info','Se actualizo la informacion del Testimony');
    }


   
    public function destroy(Testimony $testimony)
    {
        $this->authorize('autor',$testimony);

        $testimony->delete();
        return redirect()->route('admin.blog.testimony.index')->with('delete','El testimonio se elimino con exito');;
    }
}
