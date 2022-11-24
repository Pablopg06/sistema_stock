<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticulosController extends Controller
{
    public function index(){
        $articulos = Article::orderBy('id','desc');
        return view('articulos.index',compact('articulos'));
    }

    public function show(Article $articulo){
        return view('articulos.show', compact('articulo'));
    }
}
