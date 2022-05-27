<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Models\Teaching;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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
        return view('welcome', compact('announces','testimonies','teachings'));
    }
}
