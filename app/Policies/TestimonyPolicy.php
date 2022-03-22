<?php

namespace App\Policies;

use App\Models\Testimony;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestimonyPolicy
{
    use HandlesAuthorization;

    public function autor(User $user, Testimony $testimony){
        $roles = $user->getRoleNames();   
        if($user->id == $testimony->user_id || $roles[0]=='Admin Blog' ||  $roles[0]=='Master'|| $roles[0]=='Aprobar Publicaciones'){
            return true;
        }else{
            return false;
        }
    }

    public function publicado(?User $user, Testimony $testimony){
        if($testimony->status==2){
            return true;
        }else{
            return false;
        }
    }
}
