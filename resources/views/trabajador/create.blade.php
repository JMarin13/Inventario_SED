@extends('layouts.base')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Nuevo Trabajador</h1>
        </div>
    </div>
    <div class="row">
        <div class="col text-right">
            <a href="/trabajadors" class="btn btn-danger">Regresar</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <form action="/trabajadors" method="POST">
                <div class="form-group">
                    <label for="documento">Número de documento</label>
                    <input type="number" class="form-control" id="documento" placeholder="Ingresar número de documento">
                </div>
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" placeholder="Ingresar su nombre">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" placeholder="Ingresar su apellido">
                </div>
                <div class="form-group">
                    <label for="telefono">Celular</label>
                    <input type="number" class="form-control" id="telefono" placeholder="Ingresar su número de celular">
                </div>
                <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <input type="text" class="form-control" id="correo" placeholder="Ingresar su correo electrónico">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection