<?php

namespace App\Policies;

use App\Models\Ministry;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MinistryPolicy
{
    use HandlesAuthorization;


    public function autor(User $user, Ministry $ministry){
        $roles = $user->getRoleNames();   
        if($user->id == $ministry->user_id || $roles[0]=='Admin Blog'||  $roles[0]=='Master' || $roles[0]=='Aprobar Publicaciones'){
            return true;
        }else{
            return false;
        }
    }

    public function publicado(?User $user, Ministry $ministry){
        if($ministry->status==2){
            return true;
        }else{
            return false;
        }
    }
}
