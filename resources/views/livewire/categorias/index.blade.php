<div>
    {{--<div class="w-25 grid grid-cols-3 gap-6" style="display: grid; grid-template-columns; repeat(3,1fr); flex">
        @foreach ($categorias as $categoria)
            <img src="{{$categoria->imagen}}" class="img-fluid rounded" alt="Aqui va una imagen">
            <a class="btn btn-primary" href="{{route('categorias.categoria', compact('categoria'))}}">{{$categoria->nombre}}</a>
        @endforeach
    </div>--}}
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
