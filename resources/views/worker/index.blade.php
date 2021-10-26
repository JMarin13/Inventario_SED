@extends('layouts.base')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Trabajadores</h1>
        </div>
    </div>
    <div class="row">
        <div class="col text-right">
            <a href="/workers/create" class="btn btn-primary">Crear nuevo Trabajador</a>
        </div>
    </div>
    <br>
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Celular</th>
                            <th>Correo Electrónico</th>
                            <th>Ver Inventario</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody>
                            @foreach ($workers as $worker)
                                <tr>
                                    <td>{{$worker->document}}</td>
                                    <td>{{$worker->name}}</td>
                                    <td>{{$worker->lastname}}</td>
                                    <td>{{$worker->telephone}}</td>
                                    <td>{{$worker->email}}</td>
                                    <td>
                                        {{-- <a href="/workers/{{$worker->id}}/edit" class="btn btn-success">Editar</a> --}}
                                    </td>
                                    <td>
                                        <a href="/workers/{{$worker->id}}/edit" class="btn btn-success">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{route('workers.destroy', $worker)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input 
                                                type="submit" 
                                                class="btn btn-danger" 
                                                value="Eliminar"
                                                onclick="return confirm('¿Estás seguro de eliminar el Trabajador: {{$worker->name}} {{$worker->lastname}}?')"
                                            />
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection