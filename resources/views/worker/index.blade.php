@extends('layouts.app')
@section('content')
    <div class="row text-center alert alert-success">
        <div class="col">
            <h1 class="text-center">Funcionarios</h1>
        </div>
    </div>
    <br>
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <div class="form-row">
                        <div class="col">
                            <a href="/reports" class="btn btn-success btn-block">Descargar reporte de funcionarios y herramientas</a>
                        </div>
                        <div class="col text-right">
                            <a href="/workers/create" class="btn btn-primary btn-block">Crear nuevo Funcionario</a>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead class="text-center">
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Celular</th>
                            <th>Correo Electrónico</th>
                            <th>Cargo</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($workers as $worker)
                                <tr>
                                    <td>{{$worker->document}}</td>
                                    <td>{{$worker->name}}</td>
                                    <td>{{$worker->lastname}}</td>
                                    <td>{{$worker->telephone}}</td>
                                    <td>{{$worker->email}}</td>
                                    <td>{{$worker->profession}}</td>
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
    <style>
        .btn-danger {
            background-color: #555555;
        }
        .btn-success {
            background-color: #e7e7e7; 
            color: black;
        }
        .titulo {
            color: f2f2f2;
        }
    </style>
@endsection