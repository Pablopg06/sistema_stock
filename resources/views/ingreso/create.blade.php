@extends('adminlte::page')

@section('title', 'Crear artículos')

@section('content_header')
    <h1>
        <strong>
            Crear nuevo artículo
        </strong>
    </h1>
@stop

@section('content')
    <form action="{{route('ingreso.store')}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            @csrf

            <label class="form-label">
                Nombre Artículo:
                <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
            </label>

            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br> 
            @enderror
            <br>

            <label class="form-label">
                Proveedor:
                <input type="text" class="form-control" name="proveedor" value="{{old('proveedor')}}">
            </label>

            @error('proveedor')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
            <br>

            <label class="form-label">
                Código:
                <input type="number" class="form-control" name="codigo" value="{{old('codigo')}}">
            </label>

            @error('codigo')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
            <br>

            <label class="form-label">
                Imagen:
                <input type="file" name="foto">
            </label>

            <br>

            <label class="form-label">
                Marca:
                <input type="text" class="form-control" name="marca" value="{{old('marca')}}">
            </label>

            @error('marca')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
            <br>

            <label class="form-label">
                Unidades que ingresan:
                <input type="number" class="form-control" name="stock" value="{{old('stock')}}">
            </label>

            @error('stock')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
            <br>

            <label class="form-label">
                Depósito:
                <select class="form-select" aria-label="Default select example" name="deposito" value="{{old('deposito')}}">
                    <option selected>Seleccione el depósito</option>
                    <option value="deposito A">depósito A</option>
                    <option value="deposito B">depósito B</option>
                    <option value="deposito C">depósito C</option>
                </select>
            </label>

            @error('deposito')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
            <br>

            <label for="Categorias" class="form-label">Categoría:</label>
            <input class="form-control" list="opciones" id="categoria" name="categoria" placeholder="Escriba Categoría">
            <datalist id="opciones">
                
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->nombre}}">
                @endforeach
            </datalist>

            @error('categoria')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
            <br>

            <label for="Subcategorias" class="form-label">Sub Categoría:</label>
            <input class="form-control" list="opciones2" id="subcategoria" name="subcategoria" placeholder="Escriba Subcategoría">
            <datalist id="opciones2">
                
                @foreach ($subcategorias as $subcategoria)
                    <option value="{{$subcategoria->nombre}}">
                @endforeach
            </datalist>

            @error('subcategoria')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
            <br>

            <button type="submit" class="btn btn-primary">Ingresar artículo</button>
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