<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\blog\CategoryController;
use App\Http\Controllers\Admin\blog\AnnounceController;
use App\Http\Controllers\Admin\blog\ContactController;
use App\Http\Controllers\Admin\blog\MinistryController;
use App\Http\Controllers\Admin\blog\TeachingController;
use App\Http\Controllers\Admin\blog\TestimonyController;
use App\Http\Controllers\Admin\blog\UserController;
use App\Http\Controllers\Blog\EstadisticaController;
use App\Http\Livewire\Blog\Estadistidas;

Route::resource('user', UserController::class)->middleware('can:admin.blog.user.index')->only('index','edit','update')->names('admin.blog.user');
Route::resource('category', CategoryController::class)->except('show','create','edit')->middleware('can:admin.blog.category.index')->except('show')->names('admin.blog.category');
Route::resource('anuncios', AnnounceController::class)->middleware('can:admin.blog.announce.index')->except('show')->names('admin.blog.announce');
Route::resource('teaching', TeachingController::class)->middleware('can:admin.blog.teaching')->except('show')->names('admin.blog.teaching');
Route::resource('ministry', MinistryController::class)->middleware('can:admin.blog.ministry')->except('show')->names('admin.blog.ministry');
Route::resource('testimony', TestimonyController::class)->middleware('can:admin.blog.testimony')->except('show')->names('admin.blog.testimony');
Route::resource('contact', ContactController::class)->except('store')->middleware('can:admin.blog.contact')->names('admin.blog.contact');
Route::get('estadisticas',[EstadisticaController::class,'index'])->name('admin.blog.estadisticas');
Route::any('estadisticas/registrar',[EstadisticaController::class,'registrar'])->name('admin.blog.estadisticas.registrar');

// Route::domain('blog.mansiondecristo.com')->group(function () {
//     Route::resource('user', UserController::class)->middleware('can:admin.blog.user.index')->only('index','edit','update')->names('admin.blog.user');
//     Route::resource('category', CategoryController::class)->except('show','create','edit')->middleware('can:admin.blog.category.index')->except('show')->names('admin.blog.category');
//     Route::resource('anuncios', AnnounceController::class)->middleware('can:admin.blog.announce.index')->except('show')->names('admin.blog.announce');
//     Route::resource('teaching', TeachingController::class)->middleware('can:admin.blog.teaching')->except('show')->names('admin.blog.teaching');
//     Route::resource('ministry', MinistryController::class)->middleware('can:admin.blog.ministry')->except('show')->names('admin.blog.ministry');
//     Route::resource('testimony', TestimonyController::class)->middleware('can:admin.blog.testimony')->except('show')->names('admin.blog.testimony');
//     Route::resource('contact', ContactController::class)->except('store')->middleware('can:admin.blog.contact')->names('admin.blog.contact');
    
// });