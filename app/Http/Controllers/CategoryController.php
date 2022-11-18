<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categorias = Category::all();
        return view('categorias.index', compact('categorias'));
    }

    public function categoria(Category $categoria){
        $subcategorias = SubCategory::where('category_id',$categoria->id)->get();
        return view('categorias.categoria',compact('subcategorias', 'categoria'));
    }

    public function subcategoria(SubCategory $subcategoria){
        $articulos = Article::where('subcategory_id', $subcategoria->id)->get();
        return view('categorias.subcategoria', compact('articulos', 'subcategoria'));
    }
}
