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

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Categoría</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Categoría" value="{{old('nombre')}}">
            </div>

            {{--<label class="form-label">
                Nombre Categoría:
                <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
            </label>--}}

            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br> 
            @enderror

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input class="form-control" type="file" id="imagen" name="imagen">
            </div>

            {{--<label class="form-label">
                Imagen:
                <input type="file" name="imagen">
            </label>--}}
            
            @error('imagen')
                <br>
                <small>*{{$message}}</small>
                <br> 
            @enderror

            <button type="submit" class="btn btn-primary">Crear Categoría</button>
            <br>
        </div>
    </form>

    <a class="btn btn-primary" href="{{url()->previous()}}">Volver</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Crear articulo'); </script>
@stop