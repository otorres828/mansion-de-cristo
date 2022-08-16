<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable=['name','user_id'];
    public $timestamps = false;

    //relacion uno a muchos inversa

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
