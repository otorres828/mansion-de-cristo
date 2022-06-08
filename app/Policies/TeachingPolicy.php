<?php

namespace App\Policies;

use App\Models\Teaching;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeachingPolicy
{
    use HandlesAuthorization;


    public function autor(User $user, Teaching $teaching){
        $roles = $user->getRoleNames();
        foreach($roles as $rol){
            if($user->id == $teaching->user_id || $rol=='Admin Blog'||  $rol=='Master' || $rol=='Aprobar Publicaciones'){
                return true;
            }else{
                return false;
            }
        }   
    }

    public function publicado(?User $user, Teaching $teaching){
        if($teaching->status==2){
            return true;
        }else{
            return false;
        }
    }
}