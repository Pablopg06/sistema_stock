<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class EgresoController extends Controller
{
    public function egreso(Article $articulo){
        Session::put('url.intended', URL::previous());
        return view('egreso.egreso', compact('articulo'));
    }

    public function salida(Request $request, Article $articulo){

        $articulo->stock -= $request->stock_egresado;
        /*if ($articulo->stock < 5) {
            
        } else {
            # code...
        }*/
        
        $articulo->save();
        return Redirect::intended('/');
    }
}
