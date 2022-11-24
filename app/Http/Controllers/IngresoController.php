<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticulo;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class IngresoController extends Controller
{
    public function opciones(){
        return view('movimientos.ingreso');
    }

    public function manual(){
        return view('ingreso.manual');
    }

    public function create(){
        $categorias = Category::all();
        $subcategorias = SubCategory::all();
       return view('ingreso.create', compact('categorias', 'subcategorias'));
    }

    public function store(Request $request){
        $articulo = Article::create($request->except('subcategoria', 'categoria'));
        $subcategoria = SubCategory::where('nombre', 'LIKE' , $request->subcategoria)->first();
        $articulo->subcategory_id = $subcategoria->id;
        $articulo->save();
        return redirect()->route('articulos.index');
    }

    public function agregar(Article $articulo){
        Session::put('url.intended', URL::previous());
        return view('ingreso.agregar', compact('articulo'));
    }

    public function update(Request $request, Article $articulo){
        
        $articulo->stock += $request->stock_ingresado;
        $articulo->save();
        return Redirect::intended('/');
    }
}
