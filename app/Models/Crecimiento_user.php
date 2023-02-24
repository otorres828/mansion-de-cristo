<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crecimiento_user extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'crecimiento_id',
        'user_id',
    ];
}
