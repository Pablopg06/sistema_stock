@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>
        <strong>
            Categorias
        </strong>
    </h1>
@stop

@section('content')
    <p>Bienvenidos a la sección de Categorías.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @livewireStyles
@stop

@section('js')
    <script> console.log('Categorias!'); </script>
    @livewireScripts
@stop
