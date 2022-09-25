<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celula extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'nombre',
        'direccion',
        'fecha_hora',
        'user_id',
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
