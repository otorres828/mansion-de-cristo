<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    //asignacion masiva
    protected $fillable =['name','temple_id'];

    //relacion uno a muchos inversa
    public function temple(){
        return $this->belongsTo(Temple::class);
    }
    
    //relacion uno a uno 
    public function manager(){
        return $this->hasOne(Manager::class);
    }


  

}
