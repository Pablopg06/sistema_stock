@extends('adminlte::page')

@section('title', 'Agregar stock')

@section('content_header')
    <h1>
        <strong>
            Ingreso de Stock del artículo: {{$articulo->nombre}}
        </strong>
    </h1>
@stop

@section('content')
    
    <form action="{{route('ingreso.update', compact('articulo'))}}" method="POST">
        @csrf

        <label class="form-control" >
            Cantidad disponible de stock: {{$articulo->stock}}
        </label>
        <br>

        <label class="form-control">
            Cantidad que ingresa:
            <input type="number" name="stock_ingresado">
        </label>
        <br>

        <label>
            ¿Es reingreso?
            <div class="form-check">
                <input class="form-check-input" type="radio" name="reingreso" id="reingreso1" value="Si" onclick="showHide(this.value)">
                <label class="form-check-label" for="reingreso1">
                Si
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="reingreso" id="reingreso2" value="No" onclick="showHide(this.value)">
                <label class="form-check-label" for="reingreso2">
                No
                </label>
            </div>
        </label class="form-control">
        
        <div class="form-group">
            <label for="motivo"></label>
            <textarea class="form-control" name="motivo" id="motivo" rows="5" placeholder="Escriba el motivo del reingreso" value="" style="display:none"></textarea>
        </div>
        <div id="usado" style="display: none">
            <label>
                ¿Ha sido usado por más de 1 mes?
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="usado" id="usado1" value="Si">
                    <label class="form-check-label" for="usado1">
                    Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="usado" id="usado2" value="No">
                    <label class="form-check-label" for="usado2">
                    No
                    </label>
                </div>
            </label class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Ingresar stock</button>
        <br>
        <br>
    </form>
    <a class="btn btn-primary" href="{{url()->previous()}}">Volver</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Ingreso de stock'); </script>

    <script>
        
        function showHide(elm) {


            if (elm == "Si") {
                //display textbox
                document.getElementById('motivo').style.display = "block";
                document.getElementById('usado').style.display = "block";
            } else {
                //hide textbox
                document.getElementById('motivo').style.display = "none";
                document.getElementById('usado').style.display = "none";

            }

        }

    </script>
@stop