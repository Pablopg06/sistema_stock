<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticulo;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Ingreso;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class IngresoController extends Controller
{

    public function create(Category $categoria = null, SubCategory $subcategoria = null){
        
        if((!$categoria) && (!$subcategoria)){
            
            $categorias = Category::all();
            $subcategorias = SubCategory::all();
            
            return view('ingreso.create', compact('categorias', 'subcategorias'));
        }else{
            $categorias = $categoria;
            $subcategorias = $subcategoria;
            
            return view('ingreso.create', compact('categorias', 'subcategorias'));
        }
        
    }

    public function store(StoreArticulo $request){
        $articulo = Article::create($request->except('subcategoria', 'categoria','volver'));
        $subcategoria = SubCategory::where('nombre', $request->subcategoria)->first();
        $articulo->subcategory_id = $subcategoria->id;
        $file = $request->file('foto');
        $filename = $file->getClientOriginalName();
        move_uploaded_file($filename, public_path('/img/'));
        $url = env('APP_URL').'/img/'.$filename;
        $articulo->foto = $url;
        $articulo->save();
        
        if($request->volver){
            $categoria = Category::where('nombre', 'LIKE', $request->categoria)->first();
            return redirect()->route('categorias.subcategoria', compact('categoria', 'subcategoria'));
        }else{
            return redirect()->route('articulos.index');
        }
        
    }

    public function agregar(Article $articulo){
        Session::put('url.intended', URL::previous());
        return view('ingreso.agregar', compact('articulo'));
    }

    public function update(Request $request, Article $articulo){
        
        $articulo->stock += $request->stock_ingresado;
        $articulo->save();
        var_dump($request->stock_ingresado);
        var_dump($request->reingreso);
        var_dump($request->motivo);
        
        $ingreso = Ingreso::create();
        $ingreso->cantidad = $request->stock_ingresado;
        $ingreso->reingreso = $request->reingreso;
        if(!$request->motivo){
            $ingreso->motivo = "";
        }else{
            $ingreso->motivo = $request->motivo;
        }
        
        $ingreso->article_id = $articulo->id;
        $ingreso->usuario = Auth::user()->name;
        
        $ingreso->save();

        
        return Redirect::intended('/');
    }
}
