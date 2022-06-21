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
        $variable = 0;
        if(auth()->check()){
            $roles = $user->getRoleNames();
            foreach ($roles as $rol) {
                if ($rol == 'Admin Blog' || $rol == 'Master'|| $rol == 'Programador') {
                    $variable++;
                }
            }
        }
        if($teaching->status==2 || $variable>0 ){
            return true;
        }else{
            return false;
        }
    }
}