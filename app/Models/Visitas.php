<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Visitas extends Model
{    
    use Searchable;
    use HasFactory;
    protected $guarded =['id','updated_at','created_at'];

    public $timestamps = false;

    public function toSearchableArray()
    {
        $array = $this->toArray();
 
       return[
            'pagina'=>$this->pagina,
       ];
    }
}
