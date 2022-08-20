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
        foreach($roles as $rol)
            if($user->id == $anuncio->user_id || $rol=='Admin Blog'||  $rol=='Master' || $rol=='Aprobar Publicaciones')
                return true; 
        return false;
    }

    public function publicado(?User $user, Announce $anuncio){
        $variable = 0;
        if(auth()->check()){
            $roles = $user->getRoleNames();
            foreach ($roles as $rol) {
                if ($rol == 'Admin Blog' || $rol == 'Master'|| $rol == 'Programador'|| $rol == 'Aprobar Publicaciones') {
                    $variable++;
                }
            }
        }
        if($anuncio->status==2 || $variable>0 ){
            return true;
        }else{
            return false;
        }
    }
    
}
