<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\EmailSend;
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
        $variable = 0;
        foreach ($roles as $rol) {
            if ($rol == 'Admin Blog' || $rol == 'Master'|| $rol == 'Aprobar Publicaciones') {
                $variable++;
                $testimonies = Testimony::all();
            }
        }
        if ($variable == 0) {
            $testimonies = Testimony::where('user_id', auth()->user()->id)
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
        $testimony= Testimony::create($request->all());
        if($request->file('file')){
            $image_url=Storage::disk('do_spaces',)->put('imagenes/testimonios', $request->file('file'),'public'); 
            //$image_url=Storage::put('public/testimonies', $request->file('file'));
            $testimony->image()->create([
                'url'=>$image_url
            ]);            
        }
        if($request->get('status')==2){
            $modulo3 = EmailSend::find(2);
            if($modulo3->status==2){
                Notification::route('mail',DB::table('users')->select('email')   
                                                ->whereNotNull('email_verified_at')    
                                                ->get()
                                    )->notify(new EmailNotification($testimony));   
            }  
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
            $image_url=Storage::disk('do_spaces',)->put('imagenes/testimonios', $request->file('file'),'public'); 

            if($testimony->image){
                Storage::disk('do_spaces')->delete($testimony->image->url);
    
                $testimony->image->update([
                    'url'=>$image_url
                ]);
            }else{
                $testimony->image()->create([
                    'url'=>$image_url
                ]);  
            }
        }
        if($request->get('status')==2){
            $modulo3 = EmailSend::find(2);
            if($modulo3->status==2){
                Notification::route('mail',DB::table('users')->select('email')   
                                                ->whereNotNull('email_verified_at')    
                                                ->get()
                                    )->notify(new EmailNotification($testimony));   
            }  
        }
        return redirect()->route('admin.blog.testimony.edit',$testimony)->with('info','Se actualizo la informacion del Testimony');
    }


   
    public function destroy(Testimony $testimony)
    {
        $this->authorize('autor',$testimony);
        if($testimony->image){
            Storage::disk('do_spaces')->delete($testimony->image->url);        
        }
        $testimony->delete();
        return redirect()->route('admin.blog.testimony.index')->with('delete','El testimonio se elimino con exito');;
    }
}
