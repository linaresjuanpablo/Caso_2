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
Route::get('/', ["as" => "userHome", "uses" => "UserController@home"]);
Route::group(['middleware' => 'auth'], function() {
       //Usuarios
       Route::get('users/userManager', ["as" => "userAdmin", "uses" => "UserController@adminUser"]);
       Route::resource('users', 'UserController');
       //Pacientes
       Route::get('patients/patientManager', ["as" => "patientAdmin", "uses" => "PatientController@adminPatient"]);
       Route::resource('patients', 'PatientController');
       //Medicos
       Route::get('doctors/doctorManager', ["as" => "doctorAdmin", "uses" => "DoctorController@adminDoctor"]);
       Route::resource('doctors', 'DoctorController');
       //Citas
       Route::get('appointments/appointmentManager', ["as" => "appointmentAdmin", "uses" => "AppointmentController@adminAppointment"]);
       Route::resource('appointments', 'AppointmentController');

     });

Route::get('/', 'controladorCentroMedico@Login');
Route::get('centroMedico/prueba','controladorCentroMedico@prueba');
Route::get('centroMedico/asignarCitas',["as" => "asigCita", "uses" => "controladorCentroMedico@asignarCitas"]);
Route::get('centroMedico/citas', ["as" => "citas", "uses" => "controladorCentroMedico@gestionCitas"]);
Route::get('paciente/GestionPaciente',["as" => "Gpacientes", "uses" => "controladorCentroMedico@GestionPaciente"] );
Route::get('paciente/pacientes',["as" => "pacientes", "uses" => "controladorCentroMedico@pacientes"] );
Route::get('centroMedico/administrador', ["as" => "admin", "uses" => "controladorCentroMedico@menuAdministrador"]);
//Route::get('medico/medicoNuevo', ["as" => "admin", "uses" => "controladorCentroMedico@medico"]);
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
