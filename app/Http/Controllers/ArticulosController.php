<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Provider;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ArticulosController extends Controller
{
    public function index(){
        $articulos = Article::orderBy('id','desc');
        return view('articulos.index',compact('articulos'));
    }

    public function show(Article $articulo){
        $proveedores = Provider::all();
        return view('articulos.show', compact('articulo', 'proveedores'));
    }

    public function edit(Article $articulo, $volver){
        $proveedores = Provider::all();
        return view('articulos.edit', compact('articulo', 'proveedores', 'volver'));
    }

    public function update(Request $request, Article $articulo){
        $articulo->update($request->except('proveedor','volver'));
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
        if($request->foto){
            $imagen = $request->file('foto');
            $nombre_imagen = $imagen->getClientOriginalName();
            $ruta = public_path("/storage/");
            copy($imagen->getRealPath(), $ruta.$nombre_imagen);
            $url = env('APP_URL') . '/public/storage/' . $nombre_imagen;
            $articulo->foto = $url;
            
        }
        $articulo->save();
        if($request->volver){
            $subcategoria = SubCategory::where('id', $articulo->subcategory_id)->first();
            $categoria = Category::where('id', $subcategoria->category_id)->first();
            return redirect()->route('categorias.subcategoria', compact('categoria', 'subcategoria'));
        }else{
            return redirect()->route('articulos.index');
        }
        
    }

    public function reposicion($danger, $warning){
        
        $alerts = Article::all()->filter(fn ($articulo, $key)=>$articulo->stock < $articulo->stock_minimo);
        $advertencia = collect([]);
        $urgente = collect([]);

        foreach ($alerts as $alert) {
            $aux1 = Article::where('nombre', $alert->nombre)
                            ->where('provider_id', $alert->provider_id)
                            ->where('marca', $alert->marca)
                            ->where('deposito','!=', $alert->deposito)->get();
            if($aux1->count()){
                $advertencia->push($alert);
                $advertencia->all();
            }else{
                $urgente->push($alert);
                $urgente->all();
            }
        }

        if($danger){
            $alertas = $urgente;

        }elseif($warning){
            $alertas = $advertencia;
        }

        $proveedores = Provider::all();
        return view('articulos.reposicion', compact('proveedores', 'alertas'));
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
        
        $article = Article::where('nombre', $articulo->nombre)
                            ->where('provider_id', $articulo->provider_id)
                            ->where('marca', $articulo->marca)
                            ->where('deposito', $request->deposito)->get();
        if ($article->isEmpty()) {

            $articulo2 = $articulo->replicate()->fill([
                'deposito' => $request->deposito,
                'stock' => $request->stock_enviar
            ]);
            $articulo2->save();
            $articulo->stock -= $request->stock_enviar;
            $articulo->save();
        }else{
            $articulo->stock -= $request->stock_enviar;
            $articulo->save();
            $articulo2 = $article->where('deposito', $request->deposito)->first();
            //$articulo2->stock += $request->stock_enviar;
            //$articulo2->save();
            
            $articulo2->stock += $request->stock_enviar;
            $articulo2->save();
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
