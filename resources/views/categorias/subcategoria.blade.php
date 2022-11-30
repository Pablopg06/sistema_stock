@extends('adminlte::page')

@section('title', 'Subcategoria')

@section('content_header')
    <h1 class="uppercase text-center text-3x1 font-bold">
            Sub Categoría seleccionada: {{$subcategoria->nombre}}
    </h1>
    <br>
    <form action="{{route('categorias.borrar_sub', compact('categoria', 'subcategoria'))}}" class="formulario-eliminar" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">
            Eliminar Sub Categoría
        </button>
    </form>
    <br>
    <h3>Artículos</h2>
@stop

@section('content')
    
    @livewire('categorias.subcategoria', compact('categoria', 'subcategoria', 'articulos'))
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('SubCategoria!'); </script>
@stop