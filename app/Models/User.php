<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class User extends Authenticatable implements MustVerifyEmail
{
    
    use HasRecursiveRelationships;
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
    
    public $timestamps = false;

    //RELACION PARA TRAER LAS CELULAS DE LOS HIJOS
    public function recursiveCelulas()
    {
        return $this->hasManyOfDescendantsAndSelf(Celula::class);
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'temple_id',
        'group_id',
        'hierarchy_id',
        'parent_id',
    ];
 
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

  
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = [
        'profile_photo_url',
    ];

    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function announce(){
        return $this->hasMany(Announce::class);
    }

    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function teaching(){
        return $this->hasMany(Teaching::class);
    }

    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function ministry(){
        return $this->hasMany(Ministry::class);
    }

    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function testimony(){
        return $this->hasMany(Testimony::class);
    }


    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function user(){
        return $this->hasMany(User::class);
    }

    public function adminlte_profile_url(){
        return route('profile.show');
    }

    //relacion uno a muchos inversa
    public function temple(){
        return $this->belongsTo(Temple::class);
    }

    //relacion uno a muchos inversa
    public function group(){
        return $this->belongsTo(Group::class);
    }

    //relacion uno a muchos inversa::1 usuario tiene 1 jerarquia
    public function hierarchy(){
        return $this->belongsTo(Hierarchy::class);
    }

    //relacion uno a muchos polimorfica:: 1 usuario tiene muchas finanzas
    public function financeable(){
        return $this->morphToMany(Finance::class,'financeable');
    }

    public function getParentKeyName()
    {
        return 'parent_id';
    }

    public function getLocalKeyName()
    {
        return 'id';
    }

    //relacion uno a uno 
    public function manager(){
        return $this->hasOne(Manager::class);
    }

    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function note(){
        return $this->hasMany(Note::class);
    }

        //relacion uno a muchos// 1 usuario puede terner varios CELULAS
        public function celula(){
            return $this->hasMany(Celula::class);
        }

}
