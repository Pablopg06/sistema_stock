<div>
    <div class="w-25 grid grid-cols-3 gap-6" style="display: grid; grid-template-columns; repeat(3,1fr)">
        @foreach ($categorias as $categoria)
            <img src="{{$categoria->imagen}}" class="img-fluid rounded" alt="Aqui va una imagen">
            <a class="btn btn-primary" href="{{route('categorias.categoria', compact('categoria'))}}">{{$categoria->nombre}}</a>
        @endforeach
    </div>
</div>
