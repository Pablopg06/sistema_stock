@extends('adminlte::page')

@section('title', 'Egreso stock')

@section('content_header')
    <h1>
        <strong>
            Egreso de Stock del artículo: {{$articulo->nombre}}
        </strong>
    </h1>
@stop

@section('content')
    
    <form action="{{route('egreso.salida', compact('articulo'))}}" method="POST">
        @csrf

        <label class="form-control" >
            Cantidad disponible de stock: {{$articulo->stock}}
        </label>
        <br>

        <label class="form-control">
            Cantidad que desea egresar:
            <input type="number" name="stock_egresado">
        </label>
        <br>

        @error('stock_egresado')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <button type="submit" class="btn btn-primary">Dar salida del stock</button>
        <br>
        <br>
    </form>
    <a class="btn btn-primary" href="{{url()->previous()}}">Volver</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Ingreso de stock'); </script>
@stop