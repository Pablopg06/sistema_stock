@extends('adminlte::page')

@section('title', 'Ingreso manual')

@section('content_header')
    <h1>
        <strong>
            Ingreso manual de código
        </strong>
    </h1>
@stop

@section('content')
    @livewire('ingreso.manual')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Ingreso manual'); </script>
@stop