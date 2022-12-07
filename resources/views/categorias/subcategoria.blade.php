@extends('adminlte::page')

@section('title', 'Subcategoria')

@section('content_header')
    <h1 class="uppercase text-center text-3x1 font-bold">
            Sub Categoría seleccionada: {{$subcategoria->nombre}}
    </h1>
    <br>
    <form action="{{route('categorias.borrar_sub', compact('categoria', 'subcategoria'))}}" class="formulario-eliminar" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">
            Eliminar Sub Categoría
            <i class="fas fa-fw fa-trash"></i>
        </button>
    </form>
    <br>
    <h3>Artículos</h2>
@stop

@section('content')
    
    @livewire('categorias.subcategoria', compact('categoria', 'subcategoria', 'articulos'))
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('SubCategoria!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Está seguro de querer eliminar esta Sub Categoría?',
                text: "Es recomendable verificar primero que los artículos de esta Sub Categoría no tengan stock vigente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar Sub Categoría',
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

    <script>

        $('.formulario-borrar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Está seguro de querer eliminar este Artículo?',
                text: "Es recomendable verificar primero que dicho Artículo no tenga más stock vigente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Eliminar Artículo',
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