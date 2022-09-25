<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celula extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded =['id'];


    //relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

}
