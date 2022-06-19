<?php

namespace App\Http\Middleware\Mantenimiento;

use App\Models\EmailSend;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;


class MantenimientoMinisterios
{
  
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()){
            $user = User:: find(auth()->user()->id);  
            $roles = $user->getRoleNames();
            $variable = 0;
            foreach ($roles as $rol) {
                if ($rol == 'Admin Blog' || $rol == 'Master') {
                    $variable++;   
                }
            }
            if($variable==0)
                if(EmailSend::where('name','MantenimientoMinisterios')->first()->status==1)
                    return redirect()->route('mantenimiento');
        }else
            if(EmailSend::where('name','MantenimientoMinisterios')->first()->status==1)
                return redirect()->route('mantenimiento');
        return $next($request);
    }
}
