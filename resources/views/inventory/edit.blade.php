@extends('layouts.base')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Editar Herramienta: {{$inventory->name}}</h1>
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
            <form action="/inventories/{{$inventory->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="serial">Serial</label>
                    <input type="text" class="form-control" id="serial" name="serial" 
                    placeholder="Ingresar el serial" value="{{old('serial', $inventory->serial)}}" readonly>
                </div>
                <div class="form-group">
                    <label for="brand">Marca</label>
                    <input type="text" class="form-control" id="brand" name="brand" 
                    placeholder="Ingresar la marca" value="{{old('brand', $inventory->brand)}}">
                </div>
                <div class="form-group">
                    <label for="model">Modelo</label>
                    <input type="text" class="form-control" id="model" name="model" 
                    placeholder="Ingresar el modelo" value="{{old('model', $inventory->model)}}">
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" class="form-control" id="description" name="description" 
                    placeholder="Ingresar el nombre" value="{{old('description', $inventory->description)}}">
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" class="form-control" id="color" name="color" 
                    placeholder="Ingresar el color" value="{{old('color', $inventory->color)}}">
                </div>
                <div class="form-group">
                    <label for="status">Estado</label>
                    <input type="text" class="form-control" id="status" name="status" 
                    placeholder="Ingresar el estado" value="{{old('status', $inventory->status)}}">
                </div>
                <div class="form-group">
                    <label for="date_assignment">Fecha de Asignación</label>
                    <input type="date" class="form-control" id="date_assignment" name="date_assignment" 
                    placeholder="Ingresar la fecha de asignación" value="{{old('date_assignment', $inventory->date_assignment)}}">
                </div>
                <div class="form-group">
                    <label for="worker_id">Funcionario a asignar la herramienta</label>
                    <select class="form-control" id="worker_id" name="worker_id">
                        <option></option>
                        @foreach ($workers as $worker)
                            <option value="{{$worker->id}}">{{$worker->name}} {{$worker->lastname}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <a href="/inventories" class="btn btn-danger btn-block">Regresar al inventario</a>
                    </div>
                    <div class="col">
                        <input type="submit" value="Editar la Herramienta" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection