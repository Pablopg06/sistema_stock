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

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre artículo" value="{{old('nombre')}}">
            </div>

            {{--<label class="form-label w-full">
                Nombre Artículo:
                <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
            </label>--}}

            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br> 
            @enderror

            <div class="mb-3">
                <label for="proveedor" class="form-label">Proveedor</label>
                <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="Proveedor del artículo" value="{{old('proveedor')}}">
            </div>

            {{--<label class="form-label w-full">
                Proveedor:
                <input type="text" class="form-control" name="proveedor" value="{{old('proveedor')}}">
            </label>--}}

            @error('proveedor')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

            <div class="mb-3">
                <label for="codigo" class="form-label">Codigo</label>
                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código artículo" value="{{old('codigo')}}">
            </div>

            {{--<label class="form-label w-full">
                Código:
                <input type="number" class="form-control" name="codigo" value="{{old('codigo')}}">
            </label>--}}

            @error('codigo')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

            <div class="mb-3">
                <label for="foto" class="form-label">Imagen</label>
                <input class="form-control" type="file" id="foto" name="foto">
            </div>

            {{--<label class="form-label w-full">
                Imagen:
                <input type="file" name="foto">
            </label>--}}

            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca artículo" value="{{old('marca')}}">
            </div>            

            {{--<label class="form-label w-full">
                Marca:
                <input type="text" class="form-control" name="marca" value="{{old('marca')}}">
            </label>--}}

            @error('marca')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

            <div class="mb-3">
                <label for="stock" class="form-label">Unidades que ingresan</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Número de artículos que entran" value="{{old('stock')}}">
            </div>

            {{--<label class="form-label w-full">
                Unidades que ingresan:
                <input type="number" class="form-control" name="stock" value="{{old('stock')}}">
            </label>--}}

            @error('stock')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

            <div class="mb-3">
                <label for="stock_minimo" class="form-label">Punto de pedido del artículo</label>
                <input type="number" class="form-control" id="stock_minimo" name="stock_minimo" placeholder="Número de stock a partir del cual se realiza pedido de reposición" value="{{old('stock')}}">
            </div>

            {{--<label class="form-label w-full">
                Punto de pedido del artículo:
                <input type="number" class="form-control" name="stock_minimo" value="{{old('stock_minimo')}}">
            </label>--}}

            @error('stock_minimo')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

            <label class="form-label">
                Depósito:
                <select class="form-select" name="deposito" value="{{old('deposito')}}">
                    <option selected>Seleccione el depósito</option>
                    <option value="ELIZONDO">ELIZONDO</option>
                    <option value="SARMIENTO">SARMIENTO</option>
                    <option value="LEMOS Sucursal">LEMOS Sucursal</option>
                </select>
            </label>

            @error('deposito')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
            <br>
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

            <button type="submit" class="btn btn-primary">Ingresar artículo</button>
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