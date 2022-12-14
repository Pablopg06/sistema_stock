<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Egreso;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $articulo->save();
        $egreso = Egreso::create();
        $egreso->cantidad = $request->stock_egresado;
        $egreso->vendedor = Auth::user()->name;
        $egreso->article_id = $articulo->id;
        
        $egreso->save();

        $subcategoria = SubCategory::where('nombre', 'Usados')->first();
        if(($articulo->subcategory_id == $subcategoria->id)&&($articulo->stock == 0)){
            $articulo->delete();
        }

    

        return Redirect::intended('/');
    }
}
