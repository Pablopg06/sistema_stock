<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticulo;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Ingreso;
use App\Models\Provider;
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
        $articulo = Article::create($request->except('proveedor', 'subcategoria', 'categoria','volver'));
        $subcategoria = SubCategory::where('nombre', 'LIKE', $request->subcategoria)->first();
        $articulo->subcategory_id = $subcategoria->id;
        $proveedor = Provider::where('nombre', $request->proveedor)->first();
        if($proveedor){
            $articulo->provider_id = $proveedor->id;
        }else{
            if($request->proveedor != ""){
                $provider = Provider::create();
                $provider->nombre = $request->proveedor;
                $provider->save();
                $articulo->provider_id = $provider->id;
            }elseif($request->proveedor == ""){
                $articulo->provider_id = 1;
            }
        }
        if($request->imagen){
            $imagen = $request->file('foto');
            $nombre_imagen = $imagen->getClientOriginalName();
            $ruta = public_path("/storage/");
            copy($imagen->getRealPath(), $ruta.$nombre_imagen);
            $url = env('APP_URL') . '/public/storage/' . $nombre_imagen;
            //$url = $ruta.$nombre_imagen;
            $articulo->foto = $url;
        }
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

        if(($request->reingreso == "Si")&&($request->usado == "Si")){
            $categoria = Category::where('nombre', 'Usados')->first();
            $subcategoria = SubCategory::where('category_id', $categoria->id)->first();
            $articulos_usados = Article::where('subcategory_id', $subcategoria->id)->get();

            $existe = Article::where('nombre', $articulo->nombre)
                            ->where('provider_id', $articulo->provider_id)
                            ->where('marca', $articulo->marca)
                            ->where('subcategory_id', $subcategoria->id)->first();
            if($existe){
                $existe->stock += $request->stock_ingresado;
                $existe->save();
           }else{
                
                Article::create([
                    'nombre' => $articulo->nombre,
                    'codigo' => $articulo->codigo,
                    'foto' => $articulo->foto,
                    'marca' => $articulo->marca,
                    'stock' => $request->stock_ingresado,
                    'stock_minimo' => '0',
                    'deposito' => $articulo->deposito,
                    'subcategory_id' => $subcategoria->id,
                    'provider_id' => $articulo->provider_id
                ]);

           }
             
        }else{
            $articulo->stock += $request->stock_ingresado;
            $articulo->save();
            
        }

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
