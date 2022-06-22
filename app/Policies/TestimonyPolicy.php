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
        foreach($roles as $rol){
            if($user->id == $testimony->user_id || $rol=='Admin Blog'||  $rol=='Master' || $rol=='Aprobar Publicaciones'){
                return true;
            }else{
                return false;
            }
        }  
    }

    public function publicado(?User $user, Testimony $testimony){
        $variable = 0;
        if(auth()->check()){
            $roles = $user->getRoleNames();
            foreach ($roles as $rol) {
                if ($rol == 'Admin Blog' || $rol == 'Master'|| $rol == 'Programador'|| $rol == 'Aprobar Publicaciones') {
                    $variable++;
                }
            }
        }
        if($testimony->status==2 || $variable>0 ){
            return true;
        }else{
            return false;
        }
    }
}
