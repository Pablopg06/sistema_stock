@extends('adminlte::page')

@section('title', 'Subcategoria')

@section('content_header')
    <h1 class="uppercase text-center text-3x1 font-bold">
            Sub Categoría seleccionada: {{$subcategoria->nombre}}
    </h1>
    <h3>Artículos</h2>
@stop

@section('content')
    
    {{--@foreach ($articulos as $articulo)
            <a href="{{route('show',compact('articulo'))}}">{{$articulo->nombre}}</a>
            <br>
    @endforeach--}}
    @livewire('categorias.subcategoria', compact('articulos'))
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('SubCategoria!'); </script>
@stop