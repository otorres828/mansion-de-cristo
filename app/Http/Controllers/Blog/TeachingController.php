<?php
namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Teaching;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class TeachingController extends Controller
{
    public function index(){
        return view('blog.teaching.index');
    }

    public function show($slug){   
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('route:clear');
       
        $teaching = Teaching::where('slug',$slug)->first();
        $this->authorize('publicado',$teaching); 
        $similares = Teaching::where('status',2)
                            ->where('id','!=',$teaching->id)
                            ->take(4)
                            ->latest('id')
                            ->get();
                            
        return view('blog.teaching.show',compact('teaching','similares'));
    }


}
