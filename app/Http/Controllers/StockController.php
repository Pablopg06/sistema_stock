<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){
        $articulos = Article::orderBy('id','desc');
        return view('stock.index',compact('articulos'));
    }

    public function show(Article $articulo){
        return view('stock.show', compact('articulo'));
    }
}
