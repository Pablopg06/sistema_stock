@extends('adminlte::page')

@section('title', 'Informe Egresos')

@section('content_header')
    <h1>
        <strong>
            Historial de Egresos
        </strong>
    </h1>
@stop

@section('content')
    
    @livewire('informes.egresos')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Informe Egresos'); </script>
@stop