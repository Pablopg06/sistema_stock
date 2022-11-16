@extends('adminlte::page')

@section('title', 'Indice')

@section('content_header')
    <h1>
        <strong>
            Bienvenidos al índice de artículos.
        </strong>
    </h1>
@stop

@section('content')
    @livewire('show-articulos')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Indice stock!'); </script>
@stop