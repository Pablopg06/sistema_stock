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
                Punto de pedido del artículo:
                <input type="number" class="form-control" name="stock_minimo" value="{{old('stock_minimo')}}">
            </label>

            @error('stock_minimo')
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
            
            @if ($categorias instanceof \Illuminate\Database\Eloquent\Model)
                <label for="categoria" class="form-label">Categoría:</label>
                <input class="form-control" type="text" name="categoria" value="{{$categorias->nombre}}" aria-label="{{$categorias->nombre}}" readonly>
                
                @error('categoria')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
                <br>

                <input type="hidden" name="volver" value="1">

            @else
                <label for="categoria" class="form-label">Categoría:</label>
                <input class="form-control" list="opciones1" id="categoria" name="categoria" placeholder="Escriba Categoría">
                <datalist id="opciones1">
                    
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

                <input type="hidden" name="volver" value="0">
            @endif

            @if ($subcategorias instanceof \Illuminate\Database\Eloquent\Model)
                <label for="subcategoria" class="form-label">Sub Categoría:</label>
                <input class="form-control" type="text" name="subcategoria" value="{{$subcategorias->nombre}}" aria-label="{{$subcategorias->nombre}}" readonly>
                @error('subcategoria')
                    <br>
                    <small>*{{$message}}</small>
                    <br>
                @enderror
                <br>

            @else
                <label for="subcategoria" class="form-label">Sub Categoría:</label>
                <input class="form-control" list="opciones2" id="subcategoria" name="subcategoria" placeholder="Escriba Sub Categoría">
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
            @endif

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