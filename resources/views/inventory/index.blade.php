@extends('layouts.app')
@section('content')
    <div class="row text-center alert alert-success">
        <div class="col">
            <h1 class="text-center">Inventario de Herramientas </h1>
        </div>
    </div>
    <br>
    {{-- <div class="row">
        <div class="col text-right">
            <a href="/workers" class="btn btn-danger btn-block">Regresar a lista de Trabajadores</a>            
        </div>
    </div> --}}
    <br>
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <div class="col text-right">
                        <a href="/inventories/create" class="btn btn-primary">Agregar herramienta</a>
                    </div>
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead class="text-center">
                            <th>Serial</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Descripción</th>
                            <th>Color</th>
                            <th>Estado</th>
                            <th>Fecha de Asignación</th>
                            <th>Funcionario asignado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($inventories as $inventory)
                                <tr>
                                    <td>{{$inventory->serial}}</td>
                                    <td>{{$inventory->brand}}</td>
                                    <td>{{$inventory->model}}</td>
                                    <td>{{$inventory->description}}</td>
                                    <td>{{$inventory->color}}</td>
                                    <td>{{$inventory->status}}</td>
                                    <td>{{$inventory->date_assignment}}</td>
                                    <td>{{$inventory->worker_id}} </td>
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
    </style>
@endsection