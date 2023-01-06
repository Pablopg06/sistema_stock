<div>
    
    @can('ingreso.create')
        <a class="btn btn-primary" href="{{route('ingreso.create')}}">
            Ingresar nuevo artículo
            <i class="fas fa-fw fa-plus"></i>
        </a>
    @endcan

    <div class="card">
        <div class="card-header">

            @if ($urgente->count())
                @php
                    $danger = 1;
                    $warning = 0;
                @endphp
                <div class="alert alert-danger" role="alert">
                    Hay artículos que necesitan reposición de stock. No disponibles en otro depósito        
                    <a class="btn btn-light text-dark mx-4" href="{{route('articulos.reposicion', compact('danger', 'warning'))}}">Ver artículos</a>
                </div>
            @endif
            
            
            @if ($advertencia->count())
                @php
                    $danger = 0;
                    $warning = 1;
                @endphp
                <div class="alert alert-warning" role="alert">
                    Hay artículos que necesitan reposición de stock. Disponibles en otro depósito          
                    <a class="btn btn-light text-dark mx-4" href="{{route('articulos.reposicion', compact('danger', 'warning'))}}">Ver artículos</a>
                </div>
            @endif
            

            

            <div class="px-6 py-4">
                <input class="form-control w-full" type="text" wire:model="search" placeholder="Ingrese el nombre, código o proveedor del artículo"/>
            </div>
            
        </div>

        @if ($articulos->count())
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <tr class="text-center">
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Unidades disponibles</th>
                            <th>Proveedor</th>
                            <th>Código</th>
                            <th>Marca</th>
                            <th>Depósito</th>
                            <th>Categoría</th>
                            <th>Sub Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articulos as $articulo)
                            <tr class="text-center">
                                <td><img src="{{$articulo->foto}}" alt="" borde=3 height=100 width=100></td>
                                <td>{{$articulo->nombre}}</td>
                                <td>{{$articulo->stock}}</td>
                                @php
                                    $proveedor = $proveedores->find($articulo->provider_id);
                                @endphp
                                <td>{{$proveedor->nombre}}</td>
                                <td>{{$articulo->codigo}}</td>
                                <td>{{$articulo->marca}}</td>
                                <td>{{$articulo->deposito}}</td>
                                @php
                                    $subcategoria = $subcategorias->find($articulo->subcategory_id);
                                    $categoria = $categorias->find($subcategoria->category_id);
                                @endphp
                                <td>{{$categoria->nombre}}</td>
                                <td>{{$subcategoria->nombre}}</td>
                                <td style="display: flex;">

                                    <a class="mx-1" href="{{route('articulos.show', compact('articulo'))}}" title="Ver articulo">
                                        <i class="fas fa-fw fa-info"></i>
                                    </a>

                                    <a class="mx-1" href="{{route('ingreso.agregar', compact('articulo'))}}" title="Agregar stock">
                                        <i class="fas fa-fw fa-plus"></i>
                                    </a>
                                    
                                    <a class="mx-1" href="{{route('egreso.egreso', compact('articulo'))}}" title="Egreso stock">
                                        <i class="fas fa-fw fa-truck"></i>
                                    </a>

                                    @can('correccion.edit')
                                        <a class="mx-1" href="{{route('correccion.edit', compact('articulo'))}}" title="Corrección de stock">
                                            <i class="fas fa-fw fa-pen"></i>
                                        </a>
                                    @endcan

                                    @can('articulos.cambio')
                                        <a class="mx-1" href="{{route('articulos.cambio', compact('articulo'))}}" title="Cambio de depósito">
                                            <i class="fas fa-fw fa-store"></i>
                                        </a>
                                    @endcan
                                    
                                    @php
                                        $volver = 0;
                                    @endphp
                                    @can('articulos.edit')
                                        <a class="mx-1" href="{{route('articulos.edit', compact('articulo', 'volver'))}}" title="Editar articulo">
                                            <i class="fas fa-fw fa-bars"></i>
                                        </a>
                                    @endcan

                                    @can('articulos.destroy')
                                        <form action="{{route('articulos.destroy', $articulo)}}" class="formulario-borrar" method="POST" title="Borrar artículo">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs text-danger" type="submit">
                                                <i class="fa fa-lg fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                    
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
