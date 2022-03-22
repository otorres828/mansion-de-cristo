<?php

use App\Http\Controllers\Admin\Secretary\IglesiaController;
use App\Http\Controllers\Blog\AnnounceController;
use App\Http\Controllers\Blog\TeachingController;
use App\Http\Controllers\Blog\ContactController;
use App\Http\Controllers\Blog\LanddingController;
use App\Http\Controllers\Blog\MinisteryController;
use App\Http\Controllers\Blog\SearchController;
use App\Http\Controllers\Blog\TestimonyController;
use App\Http\Controllers\Secretary\SecretaryController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [LanddingController::class,'index'])->name('landding.index');



//CONTROLADORES DEL BLOG
Route::get('acercade', [ContactController::class,'acercade'])->name('blog.acercade');

Route::resource('contactanos', ContactController::class)->only('index','store')->names('blog.contact');

Route::get('noticias', [AnnounceController::class,'index'])->name('blog.announces');
Route::get('noticias/{slug}',[AnnounceController::class,'show'])->name('blog.show_announces');

Route::get('enseñanzas',[TeachingController::class,'index'])->name('blog.teaching');
Route::get('enseñanzas/{slug}',  [TeachingController::class,'show'])->name('blog.show_teaching');
Route::get('enseñanzas/autor/{email}', [TeachingController::class,'user'])->name('blog.user_teaching');

Route::get('ministerios',[MinisteryController::class,'index'])->name('blog.ministery');
Route::get('ministerios/{slug}',[MinisteryController::class,'show'])->name('blog.show_ministery');

Route::get('testimonios', [TestimonyController::class,'index'])->name('blog.testimony');
Route::get('testimonios/{slug}',  [TestimonyController::class,'show'])->name('blog.show_testimony');

Route::get('privacidad',  function(){
    return view('blog.legal.privacidad');
});
Route::get('terminos',  function(){
    return view('blog.legal.terminos');
});
//CONTROLADORES SECRETARIA
Route::get('/secretaria', [SecretaryController::class,'index'])->name('secretary.index')->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//LIMPIAR CACHE
Route::get('/clear', function () {
    echo Artisan::call('config:clear');
    echo Artisan::call('config:cache');
    echo Artisan::call('cache:clear');
    echo Artisan::call('route:clear');
});


Route::get('storage-link', function () {
    Artisan::call('storage:link');
});

Route::get('/offline', function () {
    return view('laravelpwa::offline');
});
Route::get('buscar/enseñanzas',[SearchController::class,'teaching'])->name('search.teachings');
Route::get('buscar/testimonios',[SearchController::class,'testimony'])->name('search.testimony');

