@extends('adminlte::page')

@section('title', 'Mostrar Artículo')

@section('content_header')
    <h1>
        <strong>
            Artículo 
        </strong>
    </h1>
@stop

@section('content')
    <label class="form-label">
        Nombre del producto: {{$articulo->nombre}}
    </label>
    <br>
    <label class="form-label">
        Proveedor:
    </label>
    {{$articulo->proveedor}}
    <br>
    <label class="form-label">
        Código:
    </label>
    {{$articulo->codigo}}
    <br>
    <img src="{{$articulo->foto}}" borde=3 width="200" height="200" alt="Aqui va una imagen">
    <br>
    <label class="form-label">
        Marca:
    </label>
    {{$articulo->marca}}
    <br>
    <label class="form-label">
        Stock:
    </label>
    {{$articulo->stock}}
    <br>
    <label class="form-label">
        Stock Mínimo:
    </label>
    {{$articulo->stock_minimo}}
    <br>
    <a class="btn btn-primary" href="{{url()->previous()}}">Volver</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Mostrar articulo!'); </script>
@stop