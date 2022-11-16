@extends('adminlte::page')

@section('title', 'Stock')

@section('content_header')
    <h1>
        <strong>
            Stock
        </strong>
    </h1>
@stop

@section('content')
    <p>Bienvenidos al Sistema de stock.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @livewireStyles
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    @livewireScripts
@stop
