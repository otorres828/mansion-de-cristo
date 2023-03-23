<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudesConyugue extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function manda_user(){
        return $this->belongsTo(User::class,'manda');
    }

    public function recibe_user(){
        return $this->belongsTo(User::class,'recibe');
    }
}
