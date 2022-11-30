<?php

use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\IngresoController as AdminIngresoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CorreccionController;
use App\Http\Controllers\EgresoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ArticulosController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    Route::controller(ArticulosController::class)->group(function(){
        Route::get('/articulos', 'index')->name('articulos.index');
        Route::get('/articulos/show/{articulo}', 'show')->name('articulos.show');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('/categorias','index')->name('categorias.index');
        Route::get('/categorias/categoria/{categoria}','categoria')->name('categorias.categoria');
        Route::get('/categorias/categoria/subcategoria/{subcategoria}', 'subcategoria')->name('categorias.subcategoria');
        Route::get('/categorias/volver', 'volver')->name('categorias.volver');
        Route::get('/categorias/create', 'create')->name('categorias.create');
        Route::post('/categorias/store', 'store')->name('categorias.store');
        
    });
    
    Route::controller(IngresoController::class)->group(function(){
        Route::get('/ingreso','opciones')->name('ingreso.opciones');
        Route::get('/ingreso/manual','manual')->name('ingreso.manual');
        Route::get('/ingreso/lector', 'lector')->name('ingreso.lector');
        Route::get('/ingreso/create', 'create')->name('ingreso.create');
        Route::post('/ingreso/store', 'store')->name('ingreso.store');
        Route::get('/ingreso/agregar/{articulo}', 'agregar')->name('ingreso.agregar');
        Route::post('/ingreso/update/{articulo}', 'update')->name('ingreso.update');
    });
        
    Route::controller(EgresoController::class)->group(function(){
        Route::get('/egreso/{articulo}', 'egreso')->name('egreso.egreso');
        Route::post('/egreso/salida/{articulo}', 'salida')->name('egreso.salida');
    });

    Route::controller(CorreccionController::class)->group(function(){
        Route::get('/correccion', 'index')->name('correccion.index');
        Route::get('/correccion/edit/{articulo}', 'edit')->name('correccion.edit');
        Route::put('/correccion/update/{articulo}', 'update')->name('correccion.update');
    });

});