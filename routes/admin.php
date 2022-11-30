<?php

use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\IngresoController as AdminIngresoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CorreccionController;
use App\Http\Controllers\EgresoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\SubCategoryController;
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
        Route::get('/categorias/crear', 'create')->name('categorias.create');
        Route::post('/categorias/guardar', 'store')->name('categorias.store');
        //Categoría seleccionada
        Route::get('/categorias/categoria/{categoria}','categoria')->name('categorias.categoria');
        Route::delete('/categorias/categoria/borrar/{categoria}', 'destroy')->name('categorias.destroy');
        Route::get('/categorias/categoria/crear/subcategoria/{categoria}', 'crear_sub')->name('categorias.crear_sub');
        Route::post('/categorias/categoria/crear/subcategoria/guardar/{categoria}', 'guardar_sub')->name('categorias.guardar_sub');
        //Subcategoría seleccionada
        Route::get('/categorias/categoria/subcategoria/{categoria}/{subcategoria}', 'subcategoria')->name('categorias.subcategoria');
        Route::delete('/categorias/categoria/borrar/subcategoria/{categoria}/{subcategoria}', 'borrar_sub')->name('categorias.borrar_sub');
        Route::get('/categorias/volver', 'volver')->name('categorias.volver');
        
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