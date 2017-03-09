<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladorCentroMedico extends Controller
{
  public function prueba()
  {
     return view('prueba');
  }
  public function GestionPaciente()
  {
    return view('paciente/GestionPaciente');
  }
}

