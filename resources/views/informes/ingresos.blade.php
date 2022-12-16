@extends('adminlte::page')

@section('title', 'Informe Ingresos')

@section('content_header')
    <h1>
        <strong>
            Historial de Ingresos
        </strong>
    </h1>
@stop

@section('content')
    
    @livewire('informes.ingresos')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Informe Ingresos'); </script>
@stop