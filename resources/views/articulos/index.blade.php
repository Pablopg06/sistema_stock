@extends('adminlte::page')

@section('title', 'Indice')

@section('content_header')
    <h1>
        <strong>
            Bienvenidos al índice de artículos.
        </strong>
    </h1>
@stop

@section('content')
    @livewire('show-articulos')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Indice stock!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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