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


Route::get('usuarios', ["as" => "userH", "uses" => "UserController@adminUser"]);
Route::group(['middleware' => 'auth'], function() {
       //Usuarios
       Route::get('users/create', ["as" => "userCreate", "uses" => "UserController@create"]);
       Route::get('users/userManager', ["as" => "userAdmin", "uses" => "UserController@adminUser"]);
       //

       Route::get('users/userHome', ["as" => "userHome", "uses" => "UserController@userHome"]);
       Route::get('users/index', ["as" => "userIndex", "uses" => "UserController@index"]);
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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
