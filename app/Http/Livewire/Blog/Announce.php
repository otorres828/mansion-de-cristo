<?php

namespace App\Http\Livewire\Blog;

use App\Models\Announce as ModelsAnnounce;
use App\Models\Testimony;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;

class Announce extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $token= env('APP_INSTAGRAM');
        $respuesta= json_decode(Http::get('https://graph.instagram.com/me/media?fields=id,media_type,media_url,caption,timestamp&access_token='.$token));
        if($respuesta){
            $instagrams = new Paginator($respuesta->data, 9, 1);

        }
        else $instagrams=[];
        $announces = ModelsAnnounce::where('status',2)->orderBy('id','desc')->paginate(8);
        $similares = Testimony::where('status',2)->orderBy('id','desc')->paginate(2);

        return view('livewire.blog.announce',[
            'announces'=>$announces,
            'similares'=>$similares,
            'instagrams'=>$instagrams
        ]);
    }
}
