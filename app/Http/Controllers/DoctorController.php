<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use Session;

class DoctorController extends Controller
{
    //
     public function adminDoctor()
     {
     $doctors = Doctor::all();
     return view('doctors/doctorManager',['list' => $doctors]);
     }

     public function create(Request $request)
    {
        return view('doctors.doctorCreate');
    }

     public function store(Request $request)
    {
       $input = $request->all();
       $this->validate($request, [
       'documento' => 'required | string | max:15',
       'tipo_documento' => 'required | string | max:2',
       'nombres' => 'required | string | max:100',
       'apellidos' => 'required | string | max:100',
       'especialidad' => 'required | string | max:50',
       'email' => 'required | string | max:50',
       'telefono' => 'required | string | max:50',

       ]);
       Doctor::create($input);
       Session::flash('flash_message', 'Paciente registrado correctamente!');
       $doctors = Doctor::all();
       return view('doctors/doctorManager',['list' => $doctors]);
   }
}


