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
    use HasRecursiveRelationships; //LISTA DE ADYACENCIA

    public $timestamps = false;

    //RELACION PARA TRAER LAS CELULAS DE LOS HIJOS
    public function recursiveCelulas()
    {
        return $this->hasManyOfDescendants(Celula::class);
    }

    public function  recursiveCelulasTodas(){
        return $this->hasManyOfDescendantsAndSelf(Celula::class);
    }

    public function  recursiveEvangelisticasTodas(){
        return $this->hasManyOfDescendantsAndSelf(CelulasEvangelistica::class);
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'temple_id',
        'red_id',
        'jerarquia_id',
        'parent_id',
        'codigo',
        'conyugue',
        'genero',
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
    public function announce()
    {
        return $this->hasMany(Announce::class);
    }

    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function teaching()
    {
        return $this->hasMany(Teaching::class);
    }

    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function ministry()
    {
        return $this->hasMany(Ministry::class);
    }

    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function testimony()
    {
        return $this->hasMany(Testimony::class);
    }

    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function note(){        
        return $this->hasMany(Note::class);
    }
    
    //relacion uno a muchos// 1 usuario puede terner varios CELULAS
    public function celula(){
        return $this->hasMany(Celula::class);
    }
    
    public function celulas_evangelisticas(){
        return $this->hasMany(CelulasEvangelistica::class);
    }
    
    public function visitaspendientes(){
        return $this->hasMany(VisitaPendiente::class);
    }

    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function user(){
        return $this->hasMany(User::class);
    }

    public function adminlte_profile_url()
    {
        return route('profile.show');
    }

    //relacion uno a muchos inversa
    public function temple()
    {
        return $this->belongsTo(Temple::class);
    }

    //relacion uno a muchos inversa
    public function red()
    {
        return $this->belongsTo(Red::class);
    }

    //relacion uno a muchos inversa::1 usuario tiene 1 jerarquia
    public function jerarquia()
    {
        return $this->belongsTo(Jerarquia::class);
    }

    //relacion uno a muchos polimorfica:: 1 usuario tiene muchas finanzas
    public function finance()
    {
        return $this->morphMany(Finance::class, 'financeable');
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
    public function encargado()
    {
        return $this->hasOne(Encargado::class);
    }

    public function mi_conyugue(){
        return $this->belongsTo(User::class,'conyugue');
    }


    public function cobertura(){
        return $this->belongsTo(User::class,'parent_id');
    }

    //RELACION MUCHOS A MUCHOS
    public function crecimientos(){
        return $this->belongsToMany(Crecimiento::class);
    }
}
