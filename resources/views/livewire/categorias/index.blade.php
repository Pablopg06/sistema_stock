<div>
    <a class="btn btn-danger" href="{{route('categorias.create')}}">Crear nueva Categoría</a>
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
