<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladorCentroMedico extends Controller
{
     function prueba(){
        return view('prueba');
    }

  function gestionCitas(){
        return view('citas');
    }

    function asignarCitas(){
        return view('asignarCita');
    }

}

