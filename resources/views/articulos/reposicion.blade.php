@extends('adminlte::page')

@section('title', 'Reposición')

@section('content_header')
    <h1>
        <strong>
            Los siguientes artículos necesitan reposición:
        </strong>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Artículos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alertas as $alerta)
                        <tr>
                            <td>
                                {{$alerta->nombre}}
                                <a class="btn btn-primary" href="">Realizar pedido</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a class="btn btn-primary" href="{{url()->previous()}}">Volver</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Reposición de stock!'); </script>
@stop