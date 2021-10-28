@extends('layouts.base')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Inventario de Herramientas Asignadas</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col text-right">
            <a href="/workers" class="btn btn-danger btn-block">Regresar a lista de Trabajadores</a>            
        </div>
    </div>
    <br>
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">{{$worker->name}} {{$worker->lastname}}</h1>
                    <p class="lead"><strong>Número de Documento: </strong> {{$worker->document}}</p>
                    <p class="lead"><strong>Correo Electrónico: </strong> {{$worker->email}}</p>
                    <hr class="my-4">
                    <h3>Inventario</h3>

                    <div class="col text-right">
                        <a href="/inventories/create" class="btn btn-primary">Agregar asignación de herramienta a {{$worker->name}} {{$worker->lastname}}</a>
                    </div>
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Serial</th>
                            <th>Nombre</th>
                            <th>Modelo</th>
                            <th>Fecha de Asignación</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody>
                            @foreach ($worker->inventories as $inventory)
                                <tr>
                                    <td>{{$inventory->serial}}</td>
                                    <td>{{$inventory->name}}</td>
                                    <td>{{$inventory->model}}</td>
                                    <td>{{$inventory->date_assignment}}</td>
                                    <td>
                                        <a href="/workers/{{$worker->id}}/inventories/{{$inventory->id}}/edit" class="btn btn-success">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{route('inventories.destroy', [$worker, $inventory])}}" method="POST">
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
@endsection