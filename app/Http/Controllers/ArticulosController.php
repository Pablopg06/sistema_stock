<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\SubCategory;
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

    public function reposicion(SubCategory $subcategoria = null){
        
        if($subcategoria){
            $articulos = Article::where('subcategory_id', $subcategoria->id)->get();
            $alertas = $articulos->intersect(Article::all()->filter(fn ($artic, $key)=>$artic->stock < $artic->stock_minimo));
        }elseif(!$subcategoria){
            $alertas = Article::all()->filter(fn ($articulo, $key)=>$articulo->stock < $articulo->stock_minimo);
        }
        
        return view('articulos.reposicion', compact('alertas'));
    }

    public function destroy(Article $articulo, SubCategory $subcategoria = null){
        $articulo->delete();
        if($subcategoria){
            
            $categoria = Category::where('id', $subcategoria->category_id)->first();
            return redirect()->route('categorias.subcategoria', compact('categoria', 'subcategoria'));
        }elseif (!$subcategoria) {
            return redirect()->route('articulos.index');
        }

    }
}
