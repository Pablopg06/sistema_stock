<?php

use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\IngresoController as AdminIngresoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\MovimientosController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    
    Route::get('stock', [StockController::class,'index'])->name('stock');

    Route::resource('categorias', AdminCategoriesController::class)->names('admin.categorias');
    
    //Route::resource('ingreso', AdminIngresoController::class)->names('admin.ingreso');
    Route::controller(IngresoController::class)->group(function(){
        Route::get('/ingreso','opciones')->name('ingreso.opciones');
        Route::get('/ingreso/manual','manual')->name('ingreso.manual');
        Route::get('/ingreso/lector', 'lector')->name('ingreso.lector');
        Route::get('/ingreso/create', 'create')->name('ingreso.create');
        Route::post('/ingreso/store', 'store')->name('ingreso.store');
    });
        

    Route::get('egreso', [MovimientosController::class, 'egreso'])->name('egreso');
    Route::get('correccion', [MovimientosController::class, 'correccion'])->name('correccion');
    Route::get('show/{articulo}', [MovimientosController::class, 'show'])->name('show');

});