<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celula extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'anfitrion',
        'ubicacion',
        'telefono',
        'user_id',
        'dia',
    ];

    //relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function finance()
    {
        return $this->morphMany(Finance::class, 'financeable');
    }
}
