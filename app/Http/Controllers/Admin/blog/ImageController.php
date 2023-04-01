<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function upload(Request $request){
        $path = Storage::disk('ckeditor')->put('/', $request->file('upload'));
        return response()->json(['url' => asset('ckeditor/'.$path)]);
    }
}
