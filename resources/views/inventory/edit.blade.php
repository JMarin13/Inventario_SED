@extends('layouts.base')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Editar Herramienta:  {{$inventory->name}} del trabajador {{$worker->name}} {{$worker->lastname}}</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        - {{$error}} 
                        <br>
                    @endforeach
                </div>
            @endif
            <form action="/workers/{{$worker->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="serial">Serial</label>
                    <input type="text" class="form-control" id="serial" name="serial" 
                    placeholder="Ingresar el serial" value="{{old('serial', $inventory->serial)}}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" 
                    placeholder="Ingresar el nombre" value="{{old('name', $inventory->name)}}">
                </div>
                <div class="form-group">
                    <label for="model">Modelo</label>
                    <input type="text" class="form-control" id="model" name="model" 
                    placeholder="Ingresar el modelo" value="{{old('model', $inventory->model)}}">
                </div>
                <div class="form-group">
                    <label for="date_assignment">Fecha de Asignación</label>
                    <input type="date" class="form-control" id="date_assignment" name="date_assignment" 
                    placeholder="Ingresar la fecha de asignación" value="{{old('date_assignment', $inventory->date_assignment)}}">
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <a href="/workers/{{$worker->id}}" class="btn btn-danger btn-block">Atras</a>
                    </div>
                    <div class="col">
                        <input type="submit" value="Editar la Herramienta" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection