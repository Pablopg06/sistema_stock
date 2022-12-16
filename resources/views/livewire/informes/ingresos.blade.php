<div>
    <div class="card">
        <div class="card-header">

            {{--<div class="px-6 py-4">
                <input class="form-control w-full" type="text" wire:model="search" placeholder="Ingrese el nombre o el código del artículo"/>
            </div>--}}
        </div>

        <div class="card-body">
            @if ($ingresos->count())
                <table class="table table-stripped">
                    <thead>
                        <tr class="text-center">
                            <th>N°</th>
                            <th>Artículo</th>
                            <th>Stock Ingresado</th>
                            <th>Persona a cargo del ingreso</th>
                            <th>Reingreso</th>
                            <th>Motivo</th>
                            <th>Fecha y Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingresos as $ingreso)
                            <tr class="text-center">
                                <td>{{$ingreso->id}}</td>
                                @php
                                    $articulo = $articulos->find($ingreso->article_id);
                                @endphp
                                <td>{{$articulo->nombre}}</td>
                                <td>{{$ingreso->cantidad}}</td>
                                <td>{{$ingreso->usuario}}</td>
                                <td>{{$ingreso->reingreso}}</td>
                                <td>{{$ingreso->motivo}}</td>
                                <td>{{$ingreso->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            @else
                <p>No hay ingreso registrado de Artículos</p>
            @endif
        </div>
    </div>
</div>
