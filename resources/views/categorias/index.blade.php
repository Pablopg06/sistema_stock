@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <h1>
        <strong>
            Categorías
        </strong>
    </h1>
@stop

@section('content')
    <p>Estas son las categorías disponibles</p>
    @livewire('categorias.index')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop