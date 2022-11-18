@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1 class="uppercase text-center text-3x1 font-bold">
            Categoría seleccionada: {{$categoria->nombre}}
    </h1>
    <h3>Subcategorías</h2>
@stop

@section('content')
    
    @foreach ($subcategorias as $subcategoria)
            <a href="{{route('categorias.subcategoria',compact('subcategoria'))}}">{{$subcategoria->nombre}}</a>
            <br>
    @endforeach
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Categoria!'); </script>
@stop