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
        if($user->id == $teaching->user_id || $roles[0]=='Admin Blog'||  $roles[0]=='Master' || $roles[0]=='Aprobar Publicaciones'){
            return true;
        }else{
            return false;
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