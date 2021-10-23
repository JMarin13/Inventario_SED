<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    //Prueba de conexión con la base de datos
    public function testDBConection()
    {
        try {
            DB::connection()->getPdo();
            if (DB::connection()->getDatabaseName()) {
                return "Conexión exitosa a la base de datos: " . DB::connection()->getDatabaseName();
            }else {
                die("La base de datos no ha sido encontrada, error en la conexión. Revisar la configuración!!!");
            }
        } catch (\Exception $e) {
            die("Error de conexión con el servidor de bases de datos. Revisar la configuración!!!");
        }
    }
}
