<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable =['id','user_id','group_id','temple_id'];
    public $timestamps = false;

    //relacion uno a muchos 
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relacion uno a muchos 
    public function group(){
        return $this->belongsTo(Group::class);
    }
    
}
