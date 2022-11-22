@extends('adminlte::page')

@section('title', 'Correccion de stock')

@section('content_header')
    <h1>
        <strong>
            Sección de Corrección de Stock
        </strong>
    </h1>
@stop

@section('content')
    @livewire('correccion.index')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Correccion stock!'); </script>
@stop