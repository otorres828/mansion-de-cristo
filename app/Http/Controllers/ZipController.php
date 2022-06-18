<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;
use File;
use Illuminate\Support\Facades\Storage;

class ZipController extends Controller
{
    public function index(){
            $zip = new ZipArchive;
            $filename = "respaldo.zip";
            if($zip->open(public_path($filename),ZipArchive::CREATE) === TRUE)
            {
                $files = File::files('https://mdc.nyc3.cdn.digitaloceanspaces.com/');
                foreach($files as $key=> $value){
                    $relative=basename($value);
                    $zip->addFile($value,$relative);
                }
                $zip->close();
            }
            return response()->download(public_path($filename));
    
    }
}
