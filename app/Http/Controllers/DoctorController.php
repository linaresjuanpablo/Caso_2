<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use Session;
use App\User;

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
       'documento' => 'required | string | max:15 | unique:doctors,documento',
       'tipo_documento' => 'required | string | max:2',
       'nombres' => 'required | string | max:100',
       'apellidos' => 'required | string | max:100',
       'especialidad' => 'required | string | max:50',
       'email' => 'required | email | string | max:100 | unique:doctors,email',
       'telefono' => 'required | string | max:50',

       ]);

       Doctor::create($input);
       $user=new User;
       $user->nombres=$request->nombres;
       $user->apellidos=$request->apellidos;
       $user->tipo_usuario='MEDICO';
       $user->email=$request->email;
       $user->password= $request->documento;
       $user->save();
       Session::flash('flash_message2', 'Médico registrado correctamente!');
       $doctors = Doctor::all();
       return view('doctors/doctorManager',['list' => $doctors]);
   }

    public function show(Request $request, $id)
    {

    }

     public function edit(Request $request, $id)
    {
        try
        {
            $doctor = Doctor::findOrFail($id);
            return view('doctors/doctorEdit', ['data' => $doctor]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message2', "El Medico ($id) no ha sido encontrado para editarlo!");
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            $doctor = Doctor::findOrFail($id);
            $this->validate($request, [
               'documento' => 'required | string | max:15',
               'tipo_documento' => 'required | string | max:2',
               'nombres' => 'required | string | max:100',
               'apellidos' => 'required | string | max:100',
               'especialidad' => 'required | string | max:50',
               'email' => 'required | email | string | max:100',
               'telefono' => 'required | string | max:50',
               ]);
            $input = $request->all();
            $oldEmail=$doctor->email;
            $doctor->fill($input)->save();
            $user=User::where('email','=',$oldEmail)->first();
            $user->nombres=$request->nombres;
            $user->apellidos=$request->apellidos;
            $user->email=$request->email;
            $user->save();
            Session::flash('flash_message2', 'Medico editado correctamente!');
            $doctors = Doctor::all();
            return view('doctors/doctorManager',['list' => $doctors]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message2', "El Médico ($id) no ha sido encontrado para editarlo!");
            echo "error";
            return redirect()->back();
        }
    }

    public function destroy(Request $request, $id)
    {
        try
        {
            $doctor = Doctor::findOrFail($id);
            $user=User::where('email','=',$doctor->email)->first();
            $doctor->delete();
            $user->delete();

            Session::flash('flash_message2', 'Médico eliminado correctamente!');
            $doctors = Doctor::all();
            return view('doctors/doctorManager',['list' => $doctors]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message2', "El Médico ($id) no ha sido encontrado para eliminarlo!");
            return redirect()->back();
        }
    }
}


