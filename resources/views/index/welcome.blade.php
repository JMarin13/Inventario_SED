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

            .con {
                text-align: center;
            }

            .titulo {
                text-align: center;
            }

            .pb-4 {
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                border-radius: 15px;
                text-align: center;
                margin-top: 2px;
                text-shadow: 2px;
            }

            .btn-primary {
                border-radius: 20px;
                text-align: center;
                margin-top: 2px;
            }

            .roe {
                background-color:rgba(1, 6, 8, 0.377);
                border-radius: 10px;
            }

            .mas_info {
                background-color:rgba(1, 6, 8, 0.377);
                text-align: center;
            }

            .footer {
                margin-top: 20px;
            }
   
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <a class="navbar-brand text-center" href="{{ url('/users') }}">
                {{ config('Administración', 'Administración') }}
            </a>
        </nav>
        <br>
        <div class="alert alert-success btn-block">
            <h1 class="text-center" style="color: #000">Inventario de Funcionarios y Herramientas Secretaría de Educación</h1>
        </div>
        <br>
        <div class="text-center">
            @forelse($workers as $worker)
                <h2 class="pb-2 mb-2 font-arial alert alert-success border-bottom" style="color: #000">
                    {{$worker->name}} {{$worker->lastname}}
                </h2>
                <div class="row mb-2">
                    @forelse($inventories as $inventory)
                        @if($inventory->worker_id == $worker->id)
                            <div class="col-md-4">
                                <div class="roe no-gutters border rounded overflow-hidden alert alert-success flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                    <div class="col p-4 d-flex flex-column position-static alert alert-success">
                                        <h3 class="mb-2">{{$inventory->description}} {{$inventory->brand}}</h3>
                                        <a href="{{ route('inventory.show', $inventory)}}" class="btn-primary mas_info btn-dark">Más Información</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <p>El funcionario no tiene herramientas asignadas</p>   
                    @endforelse
                </div>
            @empty
                <p>No se ha creado ningún funcionario</p>
            @endforelse
        </div>
        <div class="footer alert alert-success">
            <h5 class="text-center" style="color: #000">Derechos Reservados</h5>
            <h5 class="text-center" style="color: #000">2021</h5>
        </div>
    </body>
</html>

@endsection