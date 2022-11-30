<div>
    <div class="card">
        <div class="card-header">

            @if ($alertas->count())
                @foreach ($alertas as $alerta)
                    <div class="alert alert-danger" role="alert">
                        El artículo {{$alerta->nombre}} necesita reposición de stock
                    </div>
                @endforeach
            @endif

            <div class="px-6 py-4">
                <input class="form-control w-full" type="text" wire:model="search" placeholder="Busque artículo"/>
            </div>
        </div>

        @if ($articles->count())
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Unidades disponibles</th>
                            <th>Proveedor</th>
                            <th>Código</th>
                            <th>Marca</th>
                            <th>Depósito</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $articulo)
                            <tr>
                                <td><img src="{{$articulo->foto}}" alt="" borde=3 height=100 width=100></td>
                                <td>{{$articulo->nombre}}</td>
                                <td>{{$articulo->stock}}</td>
                                <td>{{$articulo->proveedor}}</td>
                                <td>{{$articulo->codigo}}</td>
                                <td>{{$articulo->marca}}</td>
                                <td>{{$articulo->deposito}}</td>
                                <td style="display: flex;">
                                    <a class="btn btn-xs btn-default text-success mx-1 shadow" href="{{route('articulos.show', compact('articulo'))}}" title="Ver articulo">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </a>
                                    <a href="{{route('ingreso.agregar', compact('articulo'))}}" title="Agregar stock">
                                        <i class="fas fa-fw fa-plus"></i>
                                    </a>
                                    <a href="{{route('egreso.egreso', compact('articulo'))}}" title="Egreso stock">
                                        <i class="fas fa-fw fa-truck"></i>
                                    </a>
                                    <a href="{{route('correccion.edit', compact('articulo'))}}" title="Corrección de stock">
                                        <i class="fas fa-fw fa-pen"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        @else
            <strong>No se encontró ningún artículo</strong>
        @endif
        
    </div>
    <a class="btn btn-primary" href="{{route('categorias.volver')}}">Volver a subcategorías</a>
</div>
