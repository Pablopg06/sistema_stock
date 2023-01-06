@extends('adminlte::page')

@section('title', 'Editar artículo')

@section('content_header')
    <h1>
        <strong>
            Editar artículo: {{$articulo->nombre}}
        </strong>
    </h1>
@stop

@section('content')
    
    <form action="{{route('articulos.update', $articulo)}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            @csrf

            @method('put')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre artículo" value="{{old('nombre', $articulo->nombre)}}">
            </div>

            {{--<label class="form-label">
                Nombre Artículo:
                <input type="text" class="form-control" name="nombre" value="{{old('nombre', $articulo->nombre)}}">
            </label>--}}

            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br> 
            @enderror

            @php
                $proveedor = $proveedores->find($articulo->provider_id);
            @endphp

            <div class="mb-3">
                <label for="proveedor" class="form-label">Proveedor</label>
                <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="Proveedor del artículo" value="{{old('proveedor', $proveedor->nombre)}}">
            </div>

            {{--<label class="form-label">
                Proveedor:
                <input type="text" class="form-control" name="proveedor" value="{{old('proveedor',$proveedor->nombre)}}">
            </label>--}}

            @error('proveedor')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código del artículo" value="{{old('codigo', $articulo->codigo)}}">
            </div>

            {{--<label class="form-label">
                Código:
                <input type="number" class="form-control" name="codigo" value="{{old('codigo', $articulo->codigo)}}">
            </label>--}}

            @error('codigo')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

            <div class="mb-3">
                <label for="foto" class="form-label">Imagen</label>
                <input class="form-control" type="file" id="foto" name="foto">
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca del artículo" value="{{old('marca', $articulo->marca)}}">
            </div>

            {{--<label class="form-label">
                Marca:
                <input type="text" class="form-control" name="marca" value="{{old('marca', $articulo->marca)}}">
            </label>--}}

            @error('marca')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

            <div class="mb-3">
                <label for="stock" class="form-label">Unidades de stock</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Número de artículos que hay" value="{{old('stock', $articulo->stock)}}">
            </div>

            @error('stock')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

            <div class="mb-3">
                <label for="stock_minimo" class="form-label">Punto de pedido del artículo</label>
                <input type="number" class="form-control" id="stock_minimo" name="stock_minimo" placeholder="Número de stock a partir del cual se realiza pedido de reposición" value="{{old('stock', $articulo->stock_minimo)}}">
            </div>

            {{--<label class="form-label">
                Punto de pedido del artículo:
                <input type="number" class="form-control" name="stock_minimo" value="{{old('stock_minimo', $articulo->stock_minimo)}}">
            </label>--}}

            @error('stock_minimo')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

            <input type="hidden" name="volver" value="{{$volver}}">

            <button type="submit" class="btn btn-primary">Editar artículo</button>
            <br>
        </div>
    </form>

    <a class="btn btn-primary" href="{{url()->previous()}}">Volver</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Editar articulo'); </script>
@stop