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

    //Rutas users
     Route::get('users/create', ["as" => "userCreate", "uses" => "UserController@create"]);
     Route::get('users/home', ["as" => "userHome", "uses" => "UserController@home"]);
     Route::get('users/userManager', ["as" => "userAdmin", "uses" => "UserController@adminUser"]);
     Route::group(['middleware' => 'auth'], function() { });
     Route::resource('users', 'UserController');

    Route::get('/', 'controladorCentroMedico@Login');
    Route::get('centroMedico/prueba','controladorCentroMedico@prueba');
    Route::get('centroMedico/asignarCitas',["as" => "asigCita", "uses" => "controladorCentroMedico@asignarCitas"]);
    Route::get('centroMedico/citas', ["as" => "citas", "uses" => "controladorCentroMedico@gestionCitas"]);
    Route::get('paciente/GestionPaciente',["as" => "Gpacientes", "uses" => "controladorCentroMedico@GestionPaciente"] );
    Route::get('paciente/pacientes',["as" => "pacientes", "uses" => "controladorCentroMedico@pacientes"] );
    Route::get('centroMedico/administrador', ["as" => "admin", "uses" => "controladorCentroMedico@menuAdministrador"]);
    Route::get('medico/medicoNuevo', ["as" => "admin", "uses" => "controladorCentroMedico@medico"]);

Auth::routes();

Route::get('/home', 'HomeController@index');
