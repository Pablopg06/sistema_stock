@extends('adminlte::page')

@section('title', 'Egreso artículos')

@section('content_header')
    <h1>
        <strong>
            Sección de egreso de artículos
        </strong>
    </h1>
@stop

@section('content')
    @livewire('movimientos.egreso')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Egreso'); </script>
@stop