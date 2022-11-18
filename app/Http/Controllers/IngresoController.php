<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticulo;
use Illuminate\Http\Request;
use App\Models\Article;

class IngresoController extends Controller
{
    public function opciones(){
        return view('movimientos.ingreso');
    }

    public function manual(){
        return view('ingreso.manual');
    }

    public function create(){
        return view('ingreso.create');
    }

    public function store(StoreArticulo $request){
        $articulo = Article::create($request->all());
        $file = $request->file('foto');
        $filename = $file->getClientOriginalName();
        move_uploaded_file(public_path('/img/'),$filename);
        $url = env('APP_URL').'/img/'.$filename;
        $articulo->foto = $url; 
        $articulo->save();
        return redirect()->route('stock');
    }

    public function agregar(Article $articulo){
        return view('ingreso.agregar', compact('articulo'));
    }

    public function update(StoreArticulo $request, Article $articulo){
        $articulo->update($request->all());
        $articulo->save();
        return redirect()->route('stock');
    }
}
