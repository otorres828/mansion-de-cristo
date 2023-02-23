<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Red extends Model
{
    use HasFactory;
    //asignacion masiva
    protected $fillable =['name','temple_id'];
    public $timestamps = false;
    protected $table = 'redes';

    //relacion uno a muchos inversa
    public function temple(){
        return $this->belongsTo(Temple::class);
    }
    
    //relacion uno a uno 
    public function encargado(){
        return $this->hasOne(Encargado::class);
    }

}
