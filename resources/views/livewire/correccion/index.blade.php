<div>
    <div class="card">
        <div class="card-header">
            <div class="px-6 py-4">
                <input class="form-control w-full" type="text" wire:model="search" placeholder="Busque artículo"/>
            </div>
        </div>

        @if ($articulos->count())
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            {{--<th>Foto</th>--}}
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
                        @foreach ($articulos as $articulo)
                            <tr>
                                <td>{{$articulo->nombre}}</td>
                                <td>{{$articulo->stock}}</td>
                                <td>{{$articulo->proveedor}}</td>
                                <td>{{$articulo->codigo}}</td>
                                <td>{{$articulo->marca}}</td>
                                <td>{{$articulo->deposito}}</td>
                                <td style="display: flex;">
                                    <a href="{{route('correccion.edit', compact('articulo'))}}" title="Corrección de stock">
                                        <i class="fas fa-fw fa-pen"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
            <div class="card-foot">
                {{$articulos->links()}}
            </div>
        @else
            <strong>No se encontró ningún artículo</strong>
        @endif
    </div>
</div>
