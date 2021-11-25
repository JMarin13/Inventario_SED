@extends('layouts.app')
@section('content')
    <div class="row text-center alert alert-success">
        <div class="col">
            <h1 class="text-center">Inventario de Herramientas </h1>
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
                            <a href="/inventories/create" class="btn btn-primary btn-block">Agregar herramienta</a>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead class="text-center">
                            <th>Serial</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Descripción</th>
                            <th>Fecha de Asignación</th>
                            <th>Funcionario asignado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($workers as $worker)
                                @forelse ($inventories as $inventory)
                                    @if($inventory->worker_id == $worker->id)
                                    <tr>
                                        <td>{{$inventory->serial}}</td>
                                        <td>{{$inventory->brand}}</td>
                                        <td>{{$inventory->model}}</td>
                                        <td>{{$inventory->description}}</td>
                                        <td>{{$inventory->date_assignment}}</td>
                                        <td>{{$worker->name}} {{$worker->lastname}}</td>
                                        <td>
                                            <a href="/inventories/{{$inventory->id}}/edit" class="btn btn-success">Editar</a>
                                        </td>
                                        <td>
                                            <form action="/inventories/{{$inventory->id}}" method="POST"">
                                                @csrf
                                                @method('DELETE')
                                                <input 
                                                    type="submit" 
                                                    class="btn btn-danger" 
                                                    value="Eliminar"
                                                    onclick="return confirm('¿Estás seguro de eliminar la Herramienta del inventario?')"
                                                />
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                @empty
                                    <p>Vacio</p>
                                @endforelse
                            @empty
                                <p>Vacio</p>
                            @endforelse
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
    </style>
@endsection