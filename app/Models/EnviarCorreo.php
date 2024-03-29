<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnviarCorreo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['email'];

    public function getRouteKeyName()
    {
        return 'email';
    }

}
