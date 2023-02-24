<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitaPendiente extends Model
{
    use HasFactory;
    
    const NOVISITADO=1;
    const VISITADO=2;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function celula(){
        return $this->belongsTo(CelulasEvangelistica::class);
    }

    public function getAnfitrionAttribute(){
       
        return $this->celula->anfitrion;
    }
    
}
