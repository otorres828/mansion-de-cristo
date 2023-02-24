<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class CelulasEvangelistica extends Model
{
    use HasFactory,Searchable;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function visitas(){
        return $this->hasMany(VisitaPendiente::class,'celula_id');
    }

    public function getNvisitasAttribute(){
        $i=0;
        if($this->visitas)
            foreach($this->visitas as $visita)
                if($visita->estatus==2) $i=$i+1;
        return $i;
    }

    public function getEstatusAttribute(){
        if($this->visitas)
            foreach($this->visitas as $visita)
                if($visita->estatus==1) return $visita->fecha;
        return false;
    }

    public function toSearchableArray()
    {
       return[
            'anfitrion'=>$this->anfitrion,
            'ubicacion'=>$this->ubicacion,
            'telefono'=>$this->telefono
       ];
    }
}
