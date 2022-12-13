<div>

    @can('categorias.create')
        <a class="btn btn-primary" href="{{route('categorias.create')}}">
            Crear nueva Categoría
            <i class="fas fa-fw fa-plus"></i>
        </a>
    @endcan
    <p>Estas son las categorías disponibles</p>
    <div class="container text-center">
        <div class="row">
            @foreach ($categorias as $categoria)
                <div class="col">
                    <br>
                    <img src="{{$categoria->imagen}}" width="150" height="150" alt="Aqui va una imagen">
                    <br>
                    <a class="btn btn-primary" style="text-center display:flex" href="{{route('categorias.categoria', compact('categoria'))}}">{{$categoria->nombre}}</a>
                </div>
            @endforeach
        </div>
      </div>
</div>
