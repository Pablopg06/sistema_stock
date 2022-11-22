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
                                    <a class="btn btn-xs btn-default text-success mx-1 shadow" href="{{route('show', compact('articulo'))}}" title="Ver articulo">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </a>
                                    <a href="{{route('ingreso.agregar', compact('articulo'))}}" title="Agregar stock">
                                        <i class="fas fa-fw fa-plus"></i>
                                    </a>
                                    {{-- Modal para agregar stock--}}
                                    {{--<button wire:click="activar">
                                        <i class="fas fa-fw fa-plus"></i>
                                    </button>

                                    <x-jet-dialog-modal wire:model="open">
                                        <x-slot name="title">
                                            Agregar stock del artículo {{$articulo->nombre}}
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-jet-label value="Cantidad de stock a agregar:"/>
                                            <x-jet-input type="number" class="w-full"/>
                                        </x-slot>
                                        <x-slot name="footer">
                                            <x-jet-secondary-button wire:click="desactivar">
                                                Cancelar
                                            </x-jet-secondary-button>
                                            <x-jet-danger-button>
                                                Agregar stock
                                            </x-jet-danger-button>
                                        </x-slot>
                                
                                    </x-jet-dialog-modal>--}}

                                    <a href="" title="Egreso stock">
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
            <div class="card-foot">
                {{$articulos->links()}}
            </div>
        @else
            <strong>No se encontró ningún artículo</strong>
        @endif
    </div>
</div>
