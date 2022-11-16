@extends('adminlte::page')

@section('title', 'Ingreso artículos')

@section('content_header')
    <h1>
        <strong>
            Sección para ingreso de artículos.
        </strong>
    </h1>
@stop

@section('content')
    @livewire('movimientos.ingreso')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Ingreso'); </script>
@stop