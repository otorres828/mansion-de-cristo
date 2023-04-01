<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCkeditor extends Model
{
    use HasFactory;
    protected $table = 'image_ckeditor';
    protected $guarded=['id'];
    public $timestamps = false;
}
