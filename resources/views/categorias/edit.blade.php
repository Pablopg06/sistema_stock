@extends('adminlte::page')

@section('title', 'Editar categoría')

@section('content_header')
    <h1>
        <strong>
            Editar Categoría
        </strong>
    </h1>
@stop

@section('content')
    <form action="{{route('categorias.update', $categoria)}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            @csrf

            @method('put')

            <label class="form-label">
                Nombre Categoría:
                <input type="text" class="form-control" name="nombre" value="{{old('nombre', $categoria->nombre)}}">
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

            <button type="submit" class="btn btn-primary">Editar Categoría</button>
            <br>
        </div>
    </form>

    <a class="btn btn-primary" href="{{route('categorias.categoria', compact('categoria'))}}">Volver</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Editar articulo'); </script>
@stop