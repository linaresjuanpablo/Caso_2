<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Session;

class PatientController extends Controller
{
    public function adminPatient()
    {
        $patients = Patient::all();
        return view('patients/patientManager',['list' => $patients]);
    }

    public function create(Request $request)
    {
        return view('patients.patientCreate');
    }

    public function store(Request $request)
    {
       $input = $request->all();
       $this->validate($request, [
       'documento' => 'required | string | max:15 | unique:patients,documento',
       'tipo_documento' => 'required | string | max:2',
       'nombres' => 'required | string | max:100',
       'apellidos' => 'required | string | max:100',
       'sexo' => 'required | string | max:1',
       'fecha_nacimiento' => 'required | date_format:Y-m-d',
       'eps' => 'required | string | max:50',
       'telefono' => 'required | string | max:50',
       'direccion' => 'required | string | max:50',
       'nombres_acudiente' => 'required | string | max:50',
       'telefono_acudiente' => 'required | string | max:50',
       ]);
       Patient::create($input);
       Session::flash('flash_message', 'Paciente registrado correctamente!');
       $patients = Patient::all();
       return view('patients/patientManager',['list' => $patients]);
   }

    public function show(Request $request, $id)
    {

    }

    public function edit(Request $request, $id)
    {
        try
        {
            $patient = Patient::findOrFail($id);
            return view('patients/patientEdit', ['data' => $patient]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El Paciente ($id) no ha sido encontrado para editarlo!");
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            $patient = Patient::findOrFail($id);
            $this->validate($request, [
               'documento' => 'required | string | max:15 | unique:patients,documento',
               'tipo_documento' => 'required | string | max:2',
               'nombres' => 'required | string | max:100',
               'apellidos' => 'required | string | max:100',
               'sexo' => 'required | string | max:1',
               'fecha_nacimiento' => 'required | date_format:Y-m-d',
               'eps' => 'required | string | max:50',
               'telefono' => 'required | string | max:50',
               'direccion' => 'required | string | max:50',
               'nombres_acudiente' => 'required | string | max:50',
               'telefono_acudiente' => 'required | string | max:50',
               ]);
            $input = $request->all();
            $patient->fill($input)->save();
            Session::flash('flash_message', 'Paciente editado correctamente!');
            $patients = Patient::all();
            return view('patients/patientManager',['list' => $patients]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El Paciente ($id) no ha sido encontrado para editarlo!");
            echo "error";
            return redirect()->back();
        }
    }

    public function destroy(Request $request, $id)
    {
        try
        {
            $patient = Patient::findOrFail($id);
            $patient->delete();
            Session::flash('flash_message', 'Paciente eliminado correctamente!');
            $patients = Patient::all();
            return view('patients/patientManager',['list' => $patients]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El Paciente ($id) no ha sido encontrado para eliminarlo!");
            return redirect()->back();
        }
    }
}
