<?php

use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\IngresoController as AdminIngresoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CorreccionController;
use App\Http\Controllers\EgresoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\InformesController;
use App\Http\Controllers\ProveedoresController;
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
        Route::get('/articulos/editar/{articulo}/{volver}', 'edit')->name('articulos.edit');
        Route::put('/articulos/update/{articulo}', 'update')->name('articulos.update');
        Route::get('/articulos/reposicion/{danger}/{warning}', 'reposicion')->name('articulos.reposicion');
        Route::get('/articulos/reposicion/pedidos/{proveedor}', 'pedidos')->name('articulos.pedidos');
        Route::delete('/articulos/borrar/{articulo}/{subcategoria?}', 'destroy')->name('articulos.destroy');
        Route::get('articulos/cambio-deposito/{articulo}/{subcategoria?}', 'cambio')->name('articulos.cambio');
        Route::post('articulos/deposito/{articulo}', 'deposito')->name('articulos.deposito');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('/categorias','index')->name('categorias.index');
        Route::get('/categorias/crear', 'create')->name('categorias.create');
        Route::post('/categorias/guardar', 'store')->name('categorias.store');
        Route::get('/categorias/editar/{categoria}', 'edit')->name('categorias.edit');
        Route::put('/categorias/actualizar/{categoria}', 'update')->name('categorias.update');
        //Categor??a seleccionada
        Route::get('/categorias/categoria/{categoria}','categoria')->name('categorias.categoria');
        Route::delete('/categorias/categoria/borrar/{categoria}', 'destroy')->name('categorias.destroy');
        Route::get('/categorias/categoria/crear/subcategoria/{categoria}', 'crear_sub')->name('categorias.crear_sub');
        Route::post('/categorias/categoria/crear/subcategoria/guardar/{categoria}', 'guardar_sub')->name('categorias.guardar_sub');
        //Subcategor??a seleccionada
        Route::get('/categorias/categoria/subcategoria/{categoria}/{subcategoria}', 'subcategoria')->name('categorias.subcategoria');
        Route::delete('/categorias/categoria/borrar/subcategoria/{categoria}/{subcategoria}', 'borrar_sub')->name('categorias.borrar_sub');
        Route::put('/categorias/volver', 'volver')->name('categorias.volver');
        
    });
    
    Route::controller(IngresoController::class)->group(function(){
        Route::get('/ingreso/create/{categoria?}/{subcategoria?}', 'create')->name('ingreso.create');
        Route::post('/ingreso/store/', 'store')->name('ingreso.store');
        Route::get('/ingreso/agregar/{articulo}', 'agregar')->name('ingreso.agregar');
        Route::post('/ingreso/actualizar/{articulo}', 'update')->name('ingreso.update');
    });
        
    Route::controller(EgresoController::class)->group(function(){
        Route::get('/egreso/{articulo}', 'egreso')->name('egreso.egreso');
        Route::post('/egreso/salida/{articulo}', 'salida')->name('egreso.salida');
    });

    Route::controller(CorreccionController::class)->group(function(){
        Route::get('/correccion/editar/{articulo}', 'edit')->name('correccion.edit');
        Route::put('/correccion/actualizar/{articulo}', 'update')->name('correccion.update');
    });

    Route::controller(InformesController::class)->group(function(){
        Route::get('/informes/ingresos', 'ingresos')->name('informes.ingresos');
        Route::get('/informes/egresos', 'egresos')->name('informes.egresos');
    });

    Route::controller(ProveedoresController::class)->group(function(){
        Route::get('/proveedores/indice', 'index')->name('proveedores.index');
        Route::get('/proveedores/agregar-info/{proveedor}', 'edit')->name('proveedores.edit');
        Route::put('/proveedores/actualizar/{proveedor}', 'update')->name('proveedores.update');
    });

});