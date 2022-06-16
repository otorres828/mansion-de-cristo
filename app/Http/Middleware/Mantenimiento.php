<?php

namespace App\Http\Middleware;

use App\Models\EmailSend;
use Closure;
use Illuminate\Http\Request;


class Mantenimiento
{
  
    public function handle(Request $request, Closure $next)
    {
        if(EmailSend::where('name','Mantenimiento')->first()->status==1)
            return redirect()->route('mantenimiento');
        return $next($request);
    }
}
