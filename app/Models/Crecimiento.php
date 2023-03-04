<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crecimiento extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'status'
    ];

    //relacion n:N
    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function getCompletadoAttribute(){
        return $this->users->contains(auth()->user()->id);
    }
    
    public function getCantidadAttribute(){
        return $this->users->count();
    } 
    
    public function completadouser($id){
        return $this->users->contains($id);
    }
}
