<?php

namespace App\Policies;

use App\Models\Announce;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnouncePolicy
{
    use HandlesAuthorization;

    public function autor(User $user, Announce $anuncio){
        $roles = $user->getRoleNames();   
        if($user->id == $anuncio->user_id ||  $roles[0]=='Admin Blog' ||  $roles[0]=='Master' || $roles[0]=='Aprobar Publicaciones' ){
            return true;
        }else{
            return false;
        }
    }

    public function publicado(?User $user, Announce $anuncio){
        if($anuncio->status==2){
            return true;
        }else{
            return false;
        }
    }
    
}
