<?php
namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Teaching;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class TeachingController extends Controller
{
    public function index(){
        return view('blog.teaching.index');
    }

    public function show($slug){   
        $teaching = Teaching::where('slug',$slug)->first();
        $this->authorize('publicado',$teaching); 
        $similares = Teaching::where('status',2)
                            ->where('id','!=',$teaching->id)
                            ->take(4)
                            ->latest('id')
                            ->get();
           
        $fecha = date("Y-m-d");
        $ip = $_SERVER["REMOTE_ADDR"] ?? "";
        $url=route('blog.show_teaching',$teaching);
        DB::select("INSERT INTO visitas(fecha, ip, pagina, url) 
                   VALUES('$fecha', '$ip', '$teaching->name', '$url')");


        return view('blog.teaching.show',compact('teaching','similares'));
    }

    public function downloadPdf($slug){
        $teaching = Teaching::where('slug',$slug)->first();   
        view()->share('blog.teaching.download',$teaching);
        $pdf = FacadePdf::loadView('blog.teaching.download', ['teaching' => $teaching]);
        return $pdf->download($slug.'.pdf');
    }

}
