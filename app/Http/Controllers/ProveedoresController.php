<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    public function index(){
        $proveedores = Provider::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function edit(Provider $proveedor){
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Provider $proveedor){

        $proveedor->direccion = $request->direccion;
        $proveedor->mail = $request->mail;
        $proveedor->save();

        return redirect()->route('proveedores.index');
    }
}
