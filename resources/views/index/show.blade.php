@extends('layouts.base')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inventario SED</title>

        <style>

            html, body {
            background-color: #ffffff;
            }
            .container {
                margin-top: 15px;
            }

            .row {
                background-color: rgba(1, 6, 8, 0.377);
            }

            .btn-primary {
                border-radius: 20px;
                text-align: center;
                margin-top: 10px;
            }

            .pb-4 {
                margin-top: 10px;
            }

        </style> 
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <a class="navbar-brand text-center" href="{{ url('/users') }}">
                {{ config('Administración', 'Administración') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <br>
        <div class="alert alert-success btn-block text-center">
            <h2 class="text-center" style="color: #000">Inventario de Funcionarios y Herramientas Secretaría de Educación</h2>
        </div>
        <br>
        <br>
            @foreach($workers as $worker)
                <div class="pb-4 mb-4 d-flex justify-content-center text-center">
                    <div class="col-mb-8">
                        @csrf
                        <div class="row no-gutters border overflow-hidden alert bg-secondary flex-mb-row mb-4 shadpw-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex alert alert-success flex-column position-static">
                                <h2 class="mb-0" style="color: #000">Descripción: {{$inventory->description}} {{$inventory->brand}}</h2>
                                <h4 class="card-text mb-auto">Serial: {{$inventory->serial}}</h4>
                                <h4 class="card-text mb-auto">Modelo: {{$inventory->model}}</h4>
                                <h4 class="card-text mb-auto">Fecha asignación: {{$inventory->date_assignment}}</h4>
                                <h4 class="name">Funcionario: {{$worker->name}} {{$worker->lastname}}</h4>
                                <a href="/" class="btn-primary btn-dark">Volver a página principal</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <br><br><br>
            <div class="footer alert alert-success">
                <h5 class="text-center" style="color: #000">Derechos Reservados</h5>
                <h5 class="text-center" style="color: #000">2021</h5>
            </div>
    </body>   
</html>
@endsection