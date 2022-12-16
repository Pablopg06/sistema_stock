@extends('adminlte::page')

@section('title', 'Cambio depósito')

@section('content_header')
    <h1>
        <strong>
            Cambio de depósito del Artículo: {{$articulo->nombre}}.
        </strong>
    </h1>
@stop

@section('content')
    <form action="{{route('articulos.deposito', compact('articulo'))}}" method="POST">
        @csrf

        <label class="form-control" >
            Depósito donde se encuentra disponible: {{$articulo->deposito}}
        </label>
        <br>

        <label class="form-control" >
            Cantidad disponible de stock: {{$articulo->stock}}
        </label>
        <br>

        <label class="form-control">
            Cantidad que desea enviar a otro depósito:
            <input type="number" name="stock_enviar">
        </label>
        <br>

        <label class="form-label">
            Depósito donde se enviará el artículo:
            <select class="form-select" name="deposito" value="{{old('deposito')}}">
                <option selected>Seleccione el depósito</option>
                @switch($articulo->deposito)
                    @case("deposito A")
                        <option value="deposito B">depósito B</option>
                        <option value="deposito C">depósito C</option>
                        @break
                    @case("deposito B")
                        <option value="deposito A">depósito A</option>
                        <option value="deposito C">depósito C</option>
                        @break
                    @default
                        <option value="deposito A">depósito A</option>
                        <option value="deposito B">depósito B</option>
                        
                @endswitch
            </select>
        </label>
        <br>

        @if ($subcategoria)
            <input type="hidden" name="volver" value="1">
        @else
            <input type="hidden" name="volver" value="0">
        @endif

        <button type="submit" class="btn btn-primary">Mover artículos</button>
        <br>
        <br>
    </form>
    <a class="btn btn-primary" href="{{url()->previous()}}">Volver</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Cambio de depósito!'); </script>
@stop