@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1 class="uppercase text-center text-3x1 font-bold">
            Categoría seleccionada: {{$categoria->nombre}}
    </h1>
    <h3>Subcategorías</h2>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Subcategorías disponibles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategorias as $subcategoria)
                        <tr>
                            <td>
                                <a href="{{route('categorias.subcategoria',compact('subcategoria'))}}">{{$subcategoria->nombre}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a class="btn btn-primary" href="{{route('categorias.index')}}">Volver</a>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Categoria!'); </script>
@stop