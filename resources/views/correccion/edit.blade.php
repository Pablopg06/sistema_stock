@extends('adminlte::page')

@section('title', 'Editar stock')

@section('content_header')
    <h1>
        <strong>
            Correccion de Stock del artículo: {{$articulo->nombre}}
        </strong>
    </h1>
@stop

@section('content')
    
    <form action="{{route('correccion.update', compact('articulo'))}}" method="POST">
        @csrf

        @method('put')

        <label class="form-control" >
            Cantidad disponible de stock: {{$articulo->stock}}
        </label>
        <br>

        <label class="form-control">
            Cantidad a editar de stock:
            <input type="number" name="stock">
        </label>
        <br>

        <button type="submit" class="btn btn-primary">Corregir stock</button>
        <br>

    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Correccion de stock'); </script>
@stop