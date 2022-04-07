<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Models\Testimony;
use Illuminate\Http\Request;

class LanddingController extends Controller
{
    public function index()
    {
        $announces = Announce::where('status', 2)
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();
        $testimonies = Testimony::where('status', 2)
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();
        return view('blog.landding.index', compact('announces','testimonies'));
    }
}
