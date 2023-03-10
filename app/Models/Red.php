<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getCelulasOficialesAttribute(){
        if($this->encargado->user)
            return DB::select("SELECT COUNT(c.id) AS cuenta FROM celulas c,users u,redes r WHERE c.user_id=u.id AND u.red_id=r.id AND r.id='$this->id'")[0]->cuenta;
            // return count($this->encargado->user->recursiveCelulasTodas);

        return "Asignele un encargado";
    }

    public function getCelulasEvangelisticasAttribute(){
        if($this->encargado->user)
            return DB::select("SELECT COUNT(c.id) AS cuenta FROM celulas_evangelisticas c,users u,redes r WHERE c.user_id=u.id AND u.red_id=r.id AND r.id='$this->id'")[0]->cuenta;

            // return count($this->encargado->user->recursiveEvangelisticasTodas);
        return "Asignele un encargado";
    }

    public function miembros(){
        return User::where('red_id',$this->id)->count();
    }
}
