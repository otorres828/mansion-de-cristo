<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celulas_usuario extends Model
{
    use HasFactory;

    protected $guarded =['id'];
    public $timestamps = false;
}
