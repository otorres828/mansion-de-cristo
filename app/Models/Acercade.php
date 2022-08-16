<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acercade extends Model
{
    protected $guarded =['id','create_at','updated_at'];
    use HasFactory;
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    
    //relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

}

