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

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Subcategoría</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Subcategoría" value="{{old('nombre')}}">
            </div>

            {{--<label class="form-label">
                Nombre Sub Categoría:
                <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
            </label>--}}

            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br> 
            @enderror

            {{--<label>
                ¿La subcategoría tendrá un punto de pedido en común?
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="punto_subcategoria" id="punto_subcategoria1" value="1" onclick="showHide(this.value)">
                    <label class="form-check-label" for="punto_subcategoria1">
                    Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="punto_subcategoria" id="punto_subcategoria2" value="0" onclick="showHide(this.value)">
                    <label class="form-check-label" for="punto_subcategoria2">
                    No
                    </label>
                </div>
            </label class="form-control">

            <div class="mb-3" id="stock_min" style="display: none">
                <label for="stock_min" class="form-label">Punto de pedido común de Subcategoría</label>
                <input type="number" class="form-control" name="stock_min" placeholder="Cantidad de stock a partir de la cual se decide si pedir reposición" value="{{old('stock_min')}}">
            </div>
            <br>--}}

            <button type="submit" class="btn btn-primary">Crear Sub Categoría</button>
        </div>
    </form>
    <a class="btn btn-primary" href="{{url()->previous()}}">Volver</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Crear articulo'); </script>
    <script>

        /*function showHide(elm) {


        if (elm == "1") {
            //display textbox
            document.getElementById('stock_min').style.display = "block";
        } else {
            //hide textbox
            document.getElementById('stock_min').style.display = "none";
        }

        }*/
    </script>
@stop