@extends('layouts.base')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Editar Funcionario: {{$worker->name}} {{$worker->lastname}}</h1>
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
                    <label for="document">Número de documento</label>
                    <input type="number" class="form-control" id="document" name="document" 
                    placeholder="Ingresar número de documento del trabajador" value="{{old('document', $worker->document)}}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Nombres</label>
                    <input type="text" class="form-control" id="name" name="name" 
                    placeholder="Ingresar nombres del trabajador" value="{{old('name', $worker->name)}}">
                </div>
                <div class="form-group">
                    <label for="lastname">Apellidos</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" 
                    placeholder="Ingresar apellidos del trabajador" value="{{old('lastname', $worker->lastname)}}">
                </div>
                <div class="form-group">
                    <label for="telephone">Celular</label>
                    <input type="number" class="form-control" id="telephone" name="telephone" 
                    placeholder="Ingresar número de teléfono o celular del trabajador" value="{{old('telephone', $worker->telephone)}}">
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" 
                    placeholder="Ingresar su correo electrónico" value="{{old('email', $worker->email)}}">
                </div>
                <div class="form-group">
                    <label for="profession">Cargo</label>
                    <input type="text" class="form-control" id="profession" name="profession" 
                    placeholder="Ingresar nombres del trabajador" value="{{old('profession', $worker->profession)}}">
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <a href="/workers" class="btn btn-danger btn-block">Atras</a>
                    </div>
                    <div class="col">
                        <input type="submit" value="Guardar Funcionario" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection