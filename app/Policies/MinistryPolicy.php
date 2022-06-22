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
        $variable = 0;
        if(auth()->check()){
            $roles = $user->getRoleNames();
            foreach ($roles as $rol) {
                if ($rol == 'Admin Blog' || $rol == 'Master'|| $rol == 'Programador'|| $rol == 'Aprobar Publicaciones') {
                    $variable++;
                }
            }
        }
        if($ministry->status==2 || $variable>0 ){
            return true;
        }else{
            return false;
        }
    }
}
