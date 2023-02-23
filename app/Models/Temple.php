<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temple extends Model
{
    use HasFactory;
    //asignacion masiva
    protected $fillable =['name','slug'];
    public $timestamps = false;

    //relacion uno a muchos: 1 iglesia tiene muchos usuarios
    public function user(){
        return $this->hasMany(User::class);
    }

    //relacion uno a muchos
    public function group(){
        return $this->hasMany(Red::class);
    }

    //relacion uno a muchos:: 1 iglesia tiene muchas jerarquias
    public function hierarchy(){
        return $this->hasMany(Hierarchy::class);
    }
}
