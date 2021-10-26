@extends('layouts.base')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Trabajadores</h1>
        </div>
    </div>
    <div class="row">
        <div class="col text-right">
            <a href="/trabajadors/create" class="btn btn-primary">Crear nuevo Trabajador</a>
        </div>
    </div>
    <br>
    <div class="content">
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Celular</th>
                        <th>Correo Electrónico</th>
                    </thead>
                    <tbody>
                        @foreach ($trabajadors as $trabajador)
                            <tr>
                                <td>{{$trabajador->documento}}</td>
                                <td>{{$trabajador->nombres}}</td>
                                <td>{{$trabajador->apellidos}}</td>
                                <td>{{$trabajador->telefono}}</td>
                                <td>{{$trabajador->correo}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection