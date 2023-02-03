<?php

use App\Http\Controllers\Admin\blog\ImageController;
use App\Http\Controllers\Blog\AnnounceController;
use App\Http\Controllers\Blog\TeachingController;
use App\Http\Controllers\Blog\ContactController;
use App\Http\Controllers\Blog\LanddingController;
use App\Http\Controllers\Blog\MinisteryController;
use App\Http\Controllers\Blog\SuscripcionController;
use App\Http\Controllers\Blog\TestimonyController;
use App\Http\Controllers\Secretary\SecretaryController;
use App\Http\Controllers\ZipController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [LanddingController::class,'index'])->middleware('mantenimientoCasa','mantenimientoGeneral')->name('landding.index');

//CONTROLADORES DEL BLOG
Route::get('acercade', [ContactController::class,'acercade'])->middleware('mantenimientoAcercade','mantenimientoGeneral')->name('blog.acercade');

Route::get('contactanos', [ContactController::class,'index'])->middleware('mantenimientoGeneral','mantenimientoContactanos')->name('blog.contact');
Route::post('contactanos',[ ContactController::class,'store'])->name('blog.contact.store');

Route::get('noticias', [AnnounceController::class,'index'])->middleware('mantenimientoNoticias','mantenimientoGeneral')->name('blog.announces');
Route::get('noticias/{slug}',[AnnounceController::class,'show'])->name('blog.show_announces');

Route::get('enseñanzas',[TeachingController::class,'index'])->middleware('mantenimientoEnseñanzas','mantenimientoGeneral')->name('blog.teaching');
Route::get('enseñanzas/{slug}/{id}',  [TeachingController::class,'show'])->name('blog.show_teaching');
Route::get('enseñanzas/download/{slug}',  [TeachingController::class,'downloadPdf'])->name('blog.download_teaching');

Route::get('ministerios',[MinisteryController::class,'index'])->middleware('mantenimientoMinisterios','mantenimientoGeneral')->name('blog.ministery');
Route::get('ministerios/{slug}',[MinisteryController::class,'show'])->name('blog.show_ministery');

Route::get('testimonios', [TestimonyController::class,'index'])->middleware('mantenimientoTestimonios','mantenimientoGeneral')->name('blog.testimony');
Route::get('testimonios/{slug}',  [TestimonyController::class,'show'])->name('blog.show_testimony');

Route::get('privacidad',  function(){
    return view('blog.legal.privacidad');
});
Route::get('terminos',  function(){
    return view('blog.legal.terminos');
});

// Route::post('suscripcion',[SuscripcionController::class,'suscribirse'])->name('suscripcion');

//CONTROLADORES SECRETARIA
Route::get('/secretaria', [SecretaryController::class,'index'])->name('secretary.index')->middleware('auth');

Route::post('images/upload', [ImageController::class,'upload'])->name('images.upload');


//LIMPIAR CACHE
Route::get('/clear', function () {
    echo Artisan::call('config:clear');
    echo Artisan::call('config:cache');
    echo Artisan::call('cache:clear');
    echo Artisan::call('route:clear');
    echo Artisan::call('storage:link');
});

Route::get('mantenimiento', function () {
    return view('blog/trabajando');    
})->name('mantenimiento');

Route::get('storage-link', function () {
    Artisan::call('storage:link');
});

Route::get('/offline', function () {
    return view('vendor.laravelpwa.offline');
});

Route::get('/zip',[ZipController::class,'index']);

require_once __DIR__ . '/fortify.php';
