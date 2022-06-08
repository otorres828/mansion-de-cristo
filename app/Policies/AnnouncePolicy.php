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
        foreach($roles as $rol){
            if($user->id == $anuncio->user_id || $rol=='Admin Blog'||  $rol=='Master' || $rol=='Aprobar Publicaciones'){
                return true;
            }else{
                return false;
            }
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
