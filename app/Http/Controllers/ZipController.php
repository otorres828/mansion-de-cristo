<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use Illuminate\Http\Request;
use ZipArchive;
use File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\Object_;

class ZipController extends Controller
{

    public function index(){
        $imagenes=simplexml_load_string(Http::get('https://mansion.nyc3.cdn.digitaloceanspaces.com/'));
        $digital = json_encode($imagenes);
        $objeto =  @json_decode(@json_encode($digital),1);
        return ($objeto);
            $zip = new ZipArchive;
            $filename = "respaldo.zip";
            if($zip->open(public_path($filename),ZipArchive::CREATE) === TRUE){
                // $files = File::files('https://mdc.nyc3.cdn.digitaloceanspaces.com/');
                foreach($file as $key=> $value){
                    $relative=basename($value);
                    $zip->addFile($value,$relative);
                }
                $zip->close();
            }
            return response()->download(public_path($filename));
    
    }
}
