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
        foreach($roles as $rol){
            if($user->id == $ministry->user_id || $rol=='Admin Blog'||  $rol=='Master' || $rol=='Aprobar Publicaciones'){
                return true;
            }else{
                return false;
            }
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
