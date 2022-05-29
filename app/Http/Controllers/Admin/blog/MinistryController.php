<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\MinistryRequest;
use App\Models\Ministry;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class MinistryController extends Controller
{
    
    public function index()
    {
        $user = User:: find(auth()->user()->id);  
        $roles = $user->getRoleNames();
        if($roles[0]=='Admin Blog' ||  $roles[0]=='Master'|| $roles[0]=='Aprobar Publicaciones'){
            $ministries = Ministry::select('id','name','slug','status')
                            ->latest('id')
                            ->get();
        }else{
            $ministries = Ministry::select('id','name','slug','status')
                            ->where('user_id',auth()->user()->id)
                            ->latest('id')
                            ->get();            
        }                       
        return view('admin.blog.ministry.index',compact('ministries'));    
    }

   
    public function create()
    {
        return view('admin.blog.ministry.create');
    }

   
    public function store(MinistryRequest $request)
    {

        $ministry= Ministry::create($request->all());
        if($request->file('file')){
            //$image_url=Storage::put('public/ministries', $request->file('file'));
            $image_url=Storage::disk('do_spaces',)->put('imagenes/ministerios', $request->file('file'),'public'); 
            $ministry->image()->create([
                // 'url'=>'ministries/' .$nombre
                'url'=> $image_url
            ]);            
        }
        if($request->get('status')==2){
            Notification::route('mail',DB::table('users')->select('email')   
                                             ->whereNotNull('email_verified_at')    
                                            ->get()
                                )->notify(new EmailNotification($ministry));     
        }
        return redirect()->route('admin.blog.ministry.index')->with('info','El anuncio se creo con exito');    
    }


    public function edit(Ministry $ministry)
    {

        $this->authorize('autor',$ministry);
        return view('admin.blog.ministry.edit',compact('ministry'));
    }

  
    public function update(MinistryRequest $request, Ministry $ministry)
    {
        $this->authorize('autor',$ministry);
        $ministry->update($request->all());
        if($request->file('file')){
            //$url=Storage::put('public/ministries', $request->file('file'));
            // $nombre = Str::random(20) .$request->file('file')->getClientOriginalName();
            // $ruta =storage_path() . '/app/public/ministries/' . $nombre;
            // Image::make($request->file('file'))->resize(600,400)->save($ruta);
            $image_url=Storage::disk('do_spaces',)->put('imagenes/ministerios', $request->file('file'),'public'); 
            if($ministry->image){
                // Storage::delete($ministry->image->url);
                Storage::disk('do_spaces')->delete($ministry->image->url);
    
                $ministry->image->update([
                    'url'=> $image_url
                ]);
            }else{
                $ministry->image()->create([
                    'url'=> $image_url
                ]);  
            }
        }
        if($request->get('status')==2){
            Notification::route('mail',DB::table('users')->select('email')   
                                             ->whereNotNull('email_verified_at')    
                                            ->get()
                                )->notify(new EmailNotification($ministry));     
        }
        return redirect()->route('admin.blog.ministry.edit',$ministry)->with('info','Se actualizo la informacion del Ministerio o Departamento');
    }

    
    public function destroy(Ministry $ministry)
    {
        $this->authorize('autor',$ministry);
        if($ministry->image){
            Storage::disk('do_spaces')->delete($ministry->image->url);        
        }
        $ministry->delete();
        return redirect()->route('admin.blog.ministry.index')->with('delete','El ministerio o departamento se elimino con exito');;
    }
}
