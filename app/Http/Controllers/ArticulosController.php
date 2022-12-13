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

    public function cambio(Article $articulo, SubCategory $subcategoria = null){
        return view('articulos.cambio', compact('articulo', 'subcategoria'));
    }

    public function deposito(Request $request, Article $articulo){

        if($articulo->stock == $request->stock_enviar){

            $articulo->deposito = $request->deposito;
            $articulo->save();
            
        }elseif($request->stock_enviar < $articulo->stock){
            
            $articulo->stock -= $request->stock_enviar;
            $articulo->save();
            $aux1 = Article::where('nombre', 'LIKE', $articulo->nombre)->get();
            $aux2 = Article::where('proveedor', 'LIKE', $articulo->proveedor)->get();
            $aux3 = Article::where('marca', 'LIKE', $articulo->marca)->get();
            $aux4 = Article::where('deposito', 'LIKE', $request->deposito)->get();
            $aux5 = $aux1->intersect($aux2);
            $aux6 = $aux5->intersect($aux3);
            $article = $aux6->intersect($aux4);
            if ($article->isEmpty()) {
                
                $articulo2 = $articulo->replicate()->fill([
                    'deposito' => $request->deposito,
                    'stock' => $request->stock_enviar
                ]);
                $articulo2->save();
            }else{
                
                $articulo2 = $article->first();
                $articulo2->stock += $request->stock_enviar;
                $articulo2->save();
            }
            
        }

        if($request->volver){
            $subcategoria = SubCategory::where('id', $articulo->subcategory_id)->first();
            $categoria = Category::where('id', $subcategoria->category_id)->first();
            return redirect()->route('categorias.subcategoria', compact('categoria', 'subcategoria'));
        }else{
            return redirect()->route('articulos.index');
        }

    }
}
