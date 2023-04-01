<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCkeditor extends Model
{
    protected $table = 'image_ckeditor';

    use HasFactory;
    protected $fillable = ['img_url'];
    public $timestamps = false;

    //relacion polimorfica
    public function ckeditor_images(){
        return $this->morphTo();
    }
}
