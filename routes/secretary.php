<?php

use App\Http\Controllers\Admin\Secretary\BannedController;
use App\Http\Controllers\Admin\Secretary\CelulaController;
use App\Http\Controllers\Admin\secretary\CrecimientoController;
use App\Http\Controllers\Admin\secretary\FinanceUserController;
use App\Http\Controllers\Admin\secretary\RedController;
use App\Http\Controllers\Admin\secretary\HelperController;
use App\Http\Controllers\Admin\secretary\JerarquiaController;
use App\Http\Controllers\Admin\secretary\TempleController;
use App\Http\Controllers\Admin\secretary\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('usuarios', UserController::class)->except('show', 'create', 'edit')->names('admin.secretary.user');
Route::post('eliminar-usuario', [UserController::class, 'eliminar_usuario'])->name('eliminar.usuario');
Route::post('cambiar-cobertura', [UserController::class, 'cambiar_cobertura'])->name('cambiar.cobertura');
Route::resource('jerarquias', JerarquiaController::class)->except('show', 'create', 'edit')->middleware('can:admin.secretary.admin')->names('admin.secretary.jerarquia');
Route::resource('redes', RedController::class)->except('show', 'create', 'edit')->middleware('can:admin.secretary.admin')->names('admin.secretary.red');
Route::resource('iglesias', TempleController::class)->except('show')->middleware('can:admin.secretary.temple')->names('admin.secretary.temple');
Route::get('redes/encargado',  [HelperController::class, 'manager'])->name('admin.helper');
Route::post('redes/encargado/',  [HelperController::class, 'store'])->name('admin.helper.loadin');
Route::get('usuarios/equipo/{id}',  [HelperController::class, 'team'])->name('user.team');
Route::get('redes/equipo/{id}',  [RedController::class, 'red'])->name('red.team');

//-----------------------Celulas
Route::resource('mis-celulas', CelulaController::class)->names('celulas');
Route::get('celulas/equipo', [CelulaController::class, 'mi_equipo'])->name('celulas_equipo');
Route::get('celulas/equipo/{id}', [CelulaController::class, 'miembro'])->name('celula_miembro');

//-----------------------Finanzas
Route::resource('finanzas', FinanceUserController::class)->except('show', 'create','edit')->names('admin.secretary.finance.user');
Route::get('finanzas/por_celula', [FinanceUserController::class, 'por_celula'])->name('por_celula');
Route::get('finanzas/administradores', [FinanceUserController::class,'administrar_finanzas_index'])->middleware('can:finanzas')->name('administrar.finanzas'); //VER TODOS LOS USUARIOS ADMINISTRADORES
Route::delete('finanzas/administradores/{id}', [FinanceUserController::class,'administrar_finanzas_eliminar'])->middleware('can:finanzas')->name('administrar.finanzas.eliminar'); //ELIMINAR USUARIO ADMINISTRADOR
Route::post('finanzas/administradores', [FinanceUserController::class,'administrar_finanzas_agregar'])->middleware('can:finanzas')->name('administrar.finanzas.agregar'); //ELIMINAR USUARIO ADMINISTRADOR

Route::resource('registrar/usuario', FinanceUserController::class)->except('store')->names('admin.register');

//-----------------------Crecimiento
Route::resource('crecimiento', CrecimientoController::class)->middleware('can:crecimiento')
    ->names('crecimiento');
