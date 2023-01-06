@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>
        <strong>
            Lista de Proveedores
        </strong>
    </h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-header">

            {{--<div class="px-6 py-4">
                <input class="form-control w-full" type="text" wire:model="search" placeholder="Ingrese el nombre o el código del artículo"/>
            </div>--}}
        </div>

        <div class="card-body">
            @if ($proveedores->count())
                <table class="table table-stripped">
                    <thead>
                        <tr class="text-center">
                            <th>N°</th>
                            <th>Nombre Proveedor</th>
                            <th>Dirección</th>
                            <th>Mail</th>
                            @can('proveedores.edit')
                                <th>Acciones</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proveedores as $proveedor)
                            <tr class="text-center">
                                <td>{{$proveedor->id}}</td>
                                <td>{{$proveedor->nombre}}</td>
                                <td>{{$proveedor->direccion}}</td>
                                <td>{{$proveedor->mail}}</td>
                                <td>
                                    @can('proveedores.edit')
                                        <a class="mx-1" href="{{route('proveedores.edit', compact('proveedor'))}}" title="Agregar o editar información">
                                            <i class="fas fa-fw fa-pen"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            @else
                <p>No hay Proveedores de Artículos registrados</p>
            @endif
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Proveedores'); </script>
@stop