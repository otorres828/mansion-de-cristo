<?php

use App\Http\Controllers\Admin\secretary\FinanceUserController;
use App\Http\Controllers\Admin\secretary\GroupController;
use App\Http\Controllers\Admin\secretary\HelperController;
use App\Http\Controllers\Admin\secretary\HierarchyController;
use App\Http\Controllers\Admin\secretary\TempleController;
use App\Http\Controllers\Admin\secretary\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('usuarios', UserController::class)->except('show','create','edit')->names('admin.secretary.user');

Route::resource('jerarquias', HierarchyController::class)->except('show','create','edit')->middleware('can:admin.secretary.admin')->names('admin.secretary.hierarchy');

Route::resource('redes', GroupController::class)->except('show','create','edit')->middleware('can:admin.secretary.admin')->names('admin.secretary.group');

Route::resource('iglesias', TempleController::class)->except('show')->middleware('can:admin.secretary.temple')->names('admin.secretary.temple');

Route::get('redes/encargado',  [HelperController::class,'manager'])->name('admin.helper');
Route::post('redes/encargado/',  [HelperController::class,'store'])->name('admin.helper.loadin');

Route::post('usuarios/equipo/{id}',  [HelperController::class,'team'])->name('user.team');

Route::post('redes/equipo/{id}',  [HelperController::class,'group'])->name('group.team');

Route::resource('finanzas', FinanceUserController::class)->except('show','create')->names('admin.secretary.finance.user');