<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



  Route::get('centroMedico/prueba','controladorCentroMedico@prueba');
  Route::get('centroMedico/asignarCitas',["as" => "asigCita", "uses" => "controladorCentroMedico@asignarCitas"]);
  Route::get('centroMedico/citas', ["as" => "citas", "uses" => "controladorCentroMedico@gestionCitas"]);
  Route::get('paciente/GestionPaciente',["as" => "Gpacientes", "uses" => "controladorCentroMedico@GestionPaciente"] );
  Route::get('paciente/pacientes',["as" => "pacientes", "uses" => "controladorCentroMedico@pacientes"] );
  Route::get('centroMedico/administrador', ["as" => "admin", "uses" => "controladorCentroMedico@menuAdministrador"]);
