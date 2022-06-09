<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Models\Teaching;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class LanddingController extends Controller
{
    public function index()
    {
        $announces = Announce::where('status', 2)
        ->orderBy('id', 'desc')
            ->take(4)
            ->get();
        $teachings = Teaching::where('status', 2)
        ->orderBy('id', 'desc')
            ->take(8)
            ->get();
        $testimonies = Testimony::where('status', 2)
        ->orderBy('id', 'asc')
            ->take(6)
            ->get();
        
            $fecha = date("Y-m-d");
            $ip = $_SERVER["REMOTE_ADDR"] ?? "";
            $url=route('landding.index');
            DB::select("INSERT INTO visitas(fecha, ip, pagina, url) 
                        VALUES('$fecha', '$ip', 'CASA', '$url')");
        return view('blog/trabajando');
        return view('welcome', compact('announces','testimonies','teachings'));
    }
}
