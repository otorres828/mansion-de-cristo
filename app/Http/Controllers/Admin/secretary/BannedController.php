<?php

namespace App\Http\Controllers\Admin\Secretary;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BannedController extends Controller
{
    public function update(Request $request,User $usuario){
        return $request->all();
    }
}
