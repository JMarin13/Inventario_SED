@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <h1>Nuevo Usuario</h1>
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    - {{$error}} <br>
                @endforeach
            </div>
        @endif
        <form action="/users" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombres y Apellidos</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Type the user name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="example@example.com" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}"">
            </div>
            <div class="row">
                <div class="col">
                    <a href="/users" class="btn btn-danger btn-block">Atras</a>
                </div>
                <div class="col">
                    <input type="submit" value="Guardar Usuario" class="btn btn-primary btn-block">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection