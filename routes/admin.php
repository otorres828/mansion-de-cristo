<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\blog\CategoryController;
use App\Http\Controllers\Admin\blog\AnnounceController;
use App\Http\Controllers\Admin\blog\ContactController;
use App\Http\Controllers\Admin\blog\MinistryController;
use App\Http\Controllers\Admin\blog\TeachingController;
use App\Http\Controllers\Admin\blog\TestimonyController;
use App\Http\Controllers\Admin\blog\UserController;
use App\Http\Controllers\Admin\blog\AcercadeController;
use App\Http\Controllers\Admin\blog\EmailController;
use App\Http\Controllers\Admin\blog\PanelController;
use App\Http\Controllers\Blog\EstadisticaController;


Route::resource('user', UserController::class)->middleware('can:admin.blog.user.index')->except('create','show','edit')->names('admin.blog.user');
Route::get('email', [EmailController::class,'index'])->middleware('can:admin.blog.user.index')->name('admin.blog.email.index');
Route::resource('category', CategoryController::class)->except('show', 'create', 'edit')->middleware('can:admin.blog.category.index')->except('show')->names('admin.blog.category');
Route::resource('anuncios', AnnounceController::class)->middleware('can:admin.blog.announce.index')->except('show')->names('admin.blog.announce');
Route::resource('teaching', TeachingController::class)->middleware('can:admin.blog.teaching')->except('show')->names('admin.blog.teaching');
Route::resource('ministry', MinistryController::class)->middleware('can:admin.blog.ministry')->except('show')->names('admin.blog.ministry');
Route::resource('testimony', TestimonyController::class)->middleware('can:admin.blog.testimony')->except('show')->names('admin.blog.testimony');
Route::resource('contact', ContactController::class)->except('store')->middleware('can:admin.blog.contact')->names('admin.blog.contact');
Route::get('estadisticas', [EstadisticaController::class, 'index'])->name('admin.blog.estadisticas');
Route::get('estadisticas/{pagina}/{inicio}/{fin}/mostrar', [EstadisticaController::class, 'mostrar'])->name('admin.blog.estadisticas.mostrar');
//Route::any('estadisticas/mostrar', [EstadisticaController::class, 'mostrar'])->name('admin.blog.estadisticas.mostrar');
Route::any('estadisticas/registrar', [EstadisticaController::class, 'registrar'])->name('admin.blog.estadisticas.registrar');
Route::resource('acercade', AcercadeController::class)->middleware('can:admin.blog.acercade')->except('show')->names('admin.blog.acercade');
Route::get('panel-de-control', [PanelController::class,'index'])->middleware('auth','verified')->name('admin.blog.panel');


