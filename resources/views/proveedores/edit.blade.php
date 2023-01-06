@extends('adminlte::page')

@section('title', 'Editar info Proveedor')

@section('content_header')
    <h1>
        <strong>
            Información del Proveedor: {{$proveedor->nombre}}
        </strong>
    </h1>
@stop

@section('content')
    
    <form action="{{route('proveedores.update', $proveedor)}}" method="POST">
        @csrf

        @method('put')

        <label class="form-control" >
            Nombre Proveedor: {{$proveedor->nombre}}
        </label>
        <br>

        <label class="form-control">
            Dirección:
            <input type="text" name="direccion" value="{{old('direccion', $proveedor->direccion)}}">
        </label>
        <br>

        <label class="form-control">
            Mail:
            <input type="text" name="mail" value="{{old('mail', $proveedor->mail)}}">
        </label>
        <br>

        <button type="submit" class="btn btn-primary">Editar Información</button>
        <br>
        <br>
    </form>
    <a class="btn btn-primary" href="{{url()->previous()}}">Volver</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Editar info Proveedor'); </script>
@stop