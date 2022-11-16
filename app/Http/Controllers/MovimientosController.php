<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticulo;
use App\Models\Article;
use Illuminate\Http\Request;

class MovimientosController extends Controller
{

    /*public function ingreso(){
        return view('movimientos.ingreso');
    }*/

    public function egreso(){
        return view('movimientos.egreso');
    }

    public function correccion(){
        return view('movimientos.correccion');
    }

    public function show(Article $articulo){
        return view('stock.show', compact('articulo'));
    }
}
