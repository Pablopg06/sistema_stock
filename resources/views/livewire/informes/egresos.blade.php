<div>
    <div class="card">
        <div class="card-header">

            {{--<div class="px-6 py-4">
                <input class="form-control w-full" type="text" wire:model="search" placeholder="Ingrese el nombre o el código del artículo"/>
            </div>--}}
        </div>

        <div class="card-body">
            @if ($egresos->count())
                <table class="table table-stripped">
                    <thead>
                        <tr class="text-center">
                            <th>N°</th>
                            <th>Artículo</th>
                            <th>Stock Egresado</th>
                            <th>Persona a cargo del egreso</th>
                            <th>Fecha y Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($egresos as $egreso)
                            <tr class="text-center">
                                <td>{{$egreso->id}}</td>
                                @php
                                    $articulo = $articulos->find($egreso->article_id);
                                @endphp
                                <td>{{$articulo->nombre}}</td>
                                <td>{{$egreso->cantidad}}</td>
                                <td>{{$egreso->vendedor}}</td>
                                <td>{{$egreso->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            @else
                <p>No hay egreso registrado de Artículos</p>
            @endif
        </div>
    </div>
</div>
