@extends('adminlte::page')

@section('title', 'Crear categoría')

@section('content_header')
    <h1>
        <strong>
            Crear nueva Categoría
        </strong>
    </h1>
@stop

@section('content')
    <form action="{{route('categorias.store')}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            @csrf

            <label class="form-label">
                Nombre Categoría:
                <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
            </label>

            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br> 
            @enderror
            <br>

            <label class="form-label">
                Imagen:
                <input type="file" name="imagen">
            </label>
            
            @error('imagen')
                <br>
                <small>*{{$message}}</small>
                <br> 
            @enderror
            <br>

            <button type="submit" class="btn btn-primary">Crear Categoría</button>
            <br>
        </div>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Crear articulo'); </script>
@stop