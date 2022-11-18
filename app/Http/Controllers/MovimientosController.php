<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticulo;
use App\Models\Article;
use Illuminate\Http\Request;

class MovimientosController extends Controller
{

    public function egreso(){
        return view('movimientos.egreso');
    }

    public function correccion(){
        return view('movimientos.correccion');
    }

}
