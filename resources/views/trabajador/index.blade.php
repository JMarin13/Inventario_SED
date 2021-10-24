@extends('layouts.base')
@section('content')

    <div class="content">
        <div class="row">
            <div class="col">
                <h1>Trabajadores</h1>
                <table class="table">
                    <thead>
                        <td>Documento</td>
                        <td>Nombres</td>
                        <td>Apellidos</td>
                        <td>Celular</td>
                        <td>Correo Electrónico</td>
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
