<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class CorreccionController extends Controller
{
    public function index(){
        $articulos = Article::orderBy('id','desc');
        return view('correccion.index', compact('articulos'));
    }

    public function edit(Article $articulo){
        Session::put('url.intended', URL::previous());
        return view('correccion.edit', compact('articulo'));
    }

    public function update(Request $request, Article $articulo){
        
        $articulo->update($request->all());
        $articulo->save();
        return Redirect::intended('/');
    }

}
