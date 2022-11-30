@extends('adminlte::page')

@section('title', 'Crear Subcategoría')

@section('content_header')
    <h1>
        <strong>
            Crear nueva Sub Categoría
        </strong>
    </h1>
@stop

@section('content')
    <form action="{{route('categorias.guardar_sub', compact('categoria'))}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            @csrf

            <label class="form-label">
                Nombre Sub Categoría:
                <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
            </label>

            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br> 
            @enderror
            <br>

            <button type="submit" class="btn btn-primary">Crear Sub Categoría</button>
            <br>
        </div>
    </form>
    <br>
    <a class="btn btn-primary" href="{{url()->previous()}}">Volver</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Crear articulo'); </script>
@stop