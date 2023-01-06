<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoria;
use App\Http\Requests\StoreSubCategoria;
use App\Models\Article;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

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

    public function subcategoria(Category $categoria, SubCategory $subcategoria){
        Session::put('url.intended', URL::previous());
        $articulos = Article::where('subcategory_id', $subcategoria->id)->get();
        return view('categorias.subcategoria', compact('categoria', 'subcategoria', 'articulos'));
    }

    public function volver(){
        return Redirect::intended('/');
    }

    public function create(){
        return view('categorias.create');
    }

    public function store(StoreCategoria $request){
        $categoria = Category::create($request->all());
        $imagen = $request->file('imagen');
        $nombre_imagen = $imagen->getClientOriginalName();
        $ruta = public_path("/storage/");
        copy($imagen->getRealPath(), $ruta.$nombre_imagen);
        $url = env('APP_URL') . '/public/storage/' . $nombre_imagen;
        $categoria->imagen = $url;
        $categoria->save();
        return redirect()->route('categorias.index');
    }

    public function edit(Category $categoria){
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Category $categoria){
        $categoria->update($request->all());
        if($request->imagen){
            $imagen = $request->file('imagen');
            $nombre_imagen = $imagen->getClientOriginalName();
            $ruta = public_path("/storage/");
            copy($imagen->getRealPath(), $ruta.$nombre_imagen);
            $url = env('APP_URL') . '/public/storage/' . $nombre_imagen;
            $categoria->imagen = $url;
            $categoria->save();
        }

        return redirect()->route('categorias.categoria', compact('categoria'));
    }

    public function destroy(Category $categoria){
        $categoria->delete();
        return redirect()->route('categorias.index');
    }

    public function crear_sub(Category $categoria){
        return view('categorias.crearsub', compact('categoria'));
    }

    public function guardar_sub(StoreSubCategoria $request, Category $categoria){
        $subcategoria = SubCategory::create($request->all());
        $subcategoria->category_id = $categoria->id;
        $subcategoria->save();
        return redirect()->route('categorias.categoria', compact('categoria'));
    }

    public function borrar_sub(Category $categoria, SubCategory $subcategoria){
        $subcategoria->delete();
        return redirect()->route('categorias.categoria', compact('categoria'));
    }
}
