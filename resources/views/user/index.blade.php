@extends('layouts.app')
@section('content')
<div class="row text-center alert alert-success">
    <div class="col">
        <h1 class="text-center">Sección de Administradores</h1>
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        <div class="jumbotron">
            <div class="row">
                <div class="col text-right">
                    <a href="/users/create" class="btn btn-primary" role="button">Agregar Nuevo Administrador</a>
                </div>
            </div>
            <br>
            <table class="table table-bodered table-striped">
                <thead>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                        <a class="btn btn-success" href="/users/{{$user->id}}/edit">Editar</a>
                        </td>
                        <td>
                            <form action="/users/{{$user->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input
                                    type="submit"
                                    class="btn btn-danger"
                                    value="Eliminar"
                                    onclick="return confirm('¿Está seguro que desea eliminar el usuario?')"
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