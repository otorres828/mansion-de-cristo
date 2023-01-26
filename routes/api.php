<?php

use App\Http\Controllers\Admin\blog\CategoryController;
use App\Http\Controllers\ZipController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::get('zip',[ZipController::class,'index']);