@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1 class="uppercase text-center text-3x1 font-bold">
        <div class="center" style="display: flex">
            Categoría seleccionada: {{$categoria->nombre}}

            <a class="btn btn-primary" href="{{route('categorias.edit', compact('categoria'))}}" title="Editar Categoría">
                <i class="fas fa-fw fa-pen"></i>
            </a>
        </div>
    </h1>

    @can('categorias.destroy')
        <form action="{{route('categorias.destroy', $categoria)}}" class="formulario-eliminar" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">
                Eliminar Categoría
                <i class="fas fa-fw fa-trash"></i>
            </button>
        </form>        
    @endcan

    <br>
    <h3>Subcategorías</h2>

    @can('categorias.crear_sub')
        <a class="btn btn-primary" href="{{route('categorias.crear_sub', compact('categoria'))}}">
            Crear nueva Sub Categoría
            <i class="fas fa-fw fa-plus"></i>
        </a>
    @endcan
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
                                <a href="{{route('categorias.subcategoria',compact('categoria','subcategoria'))}}">{{$subcategoria->nombre}}</a>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Está seguro de querer eliminar esta Categoría?',
                text: "Es recomendable verificar primero que las subcategorías y artículos no tengan stock vigente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar Categoría',
                cancelButtonText: 'Cancelar',
                }).then((result) => {
                if (result.isConfirmed) {
                    /*Swal.fire(
                    'Eliminada',
                    'La Categoría ha sido eliminada',
                    'success'
                    )*/
                    this.submit();
                }
            })
        });

    </script>
@stop