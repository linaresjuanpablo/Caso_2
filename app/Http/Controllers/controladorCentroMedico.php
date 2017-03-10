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

  public function GestionPaciente()
  {
    return view('paciente/GestionPaciente');
  }

<<<<<<< HEAD
  public function Login()
  {
    return view('login/Login');
  }

=======
>>>>>>> origin/master
 public function pacientes()
  {
    return view('paciente/pacientes');
  }

  public function menuAdministrador()
  {
    return view('menuAdmin');
  }

}

