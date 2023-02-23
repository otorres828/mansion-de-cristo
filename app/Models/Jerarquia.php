<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jerarquia extends Model
{
    use HasFactory;
    protected $table = 'jerarquias';
    protected $fillable =['name','nivel','temple_id'];
    public $timestamps = false;

    //relacion uno a muchos:: 1 jerarquia tiene muchos usuarios
    public function user(){
        return $this->hasMany(User::class);
    }

    //relacion uno a muchos inversa::1 jerarquia tiene 1 iglesia
    public function temple(){
        return $this->belongsTo(Temple::class);
    }
}
