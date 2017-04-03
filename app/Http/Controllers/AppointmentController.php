<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Patient;
use App\Doctor;
use Session;
use Validator;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments/appointmentManager',['list' => $appointments]);
    }

    public function adminAppointment()
    {
        $appointments = Appointment::all();
        return view('appointments/appointmentManager',['list' => $appointments]);
    }

    public function create(Request $request)
    {
        $patients = Patient::all('id','nombres');
        $patientsArray = array('' => 'Seleccione...');
        foreach ($patients as $patient) {
            $patientsArray += array($patient->id => $patient->nombres);
        }

        $doctors = Doctor::all('id','nombres');
        $doctorsArray = array('' => 'Seleccione...');
        foreach ($doctors as $doctor) {
            $doctorsArray += array($doctor->id => $doctor->nombres);
        }

        return view('appointments.appointmentCreate', ['patient' => $patientsArray, 'doctor' => $doctorsArray]);
    }

    function buscarCitaDoctor($doctor,$fecha,$hora)
    {
        $buscarCita=Appointment::where('doctor_id','=',$doctor)
           ->where('fecha','=',$fecha)
           ->where('hora','=',$hora)->first();

        return count($buscarCita);

    }

    function buscarCitaPaciente($patient,$fecha,$hora)
    {
        $buscarCita=Appointment::where('patient_id','=',$patient)
           ->where('fecha','=',$fecha)
           ->where('hora','=',$hora)->first();

        return count($buscarCita);

    }

    public function store(Request $request)
    {
       $input = $request->all();


       /*$this->validate($request, [
       'fecha' => 'required | date_format:Y-m-d',
       'hora' => 'required | date_format:H:i',
       'patient_id' => 'required',
       'doctor_id' => 'required',
       'valor' => 'required | string',
       'estado' => 'required',
       ]);*/

        $validator = Validator::make($request->all(), [
        'fecha' => 'required | date_format:Y-m-d',
        'hora' => 'required | date_format:H:i',
        'patient_id' => 'required',
        'doctor_id' => 'required',
        'valor' => 'required | string',
        'estado' => 'required',
        ]);


        if (!$validator->fails()) {
            $validator->after(function ($validator) use ($request){

           if ($this->buscarCitaDoctor($request->doctor_id,$request->fecha,$request->hora)>0) {
             $validator->errors()->add('', 'Ya existe una cita asignada en fecha y hora con el médico seleccionado!!!');
            }

            if ($this->buscarCitaPaciente($request->patient_id,$request->fecha,$request->hora)>0) {
             $validator->errors()->add('', 'Ya existe una cita asignada en fecha y hora para el paciente dado!!!');
            }



       });

    }


        if ($validator->fails()) {
            return redirect('appointments\create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Appointment::create($input);
        $appointments = Appointment::all();
         Session::flash('flash_message', 'Cita registrada correctamente!');

         return view('appointments/appointmentManager',['list' => $appointments]);
   }

    public function show(Request $request, $id)
    {

    }

    public function edit(Request $request, $id)
    {
        $patients = Patient::all('id','nombres');
        $patientsArray = array('' => 'Seleccione...');
        foreach ($patients as $patient) {
            $patientsArray += array($patient->id => $patient->nombres);
        }

        $doctors = Doctor::all('id','nombres');
        $doctorsArray = array('' => 'Seleccione...');
        foreach ($doctors as $doctor) {
            $doctorsArray += array($doctor->id => $doctor->nombres);
        }

        try
        {
            $appointments = Appointment::findOrFail($id);
            return view('appointments/appointmentEdit', ['data' => $appointments, 'patient' => $patientsArray, 'doctor' => $doctorsArray]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "La cita ($id) no ha sido encontrado para editarla!");
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            $appointments = Appointment::findOrFail($id);
            $this->validate($request, [
               'fecha' => 'required | date_format:Y-m-d',
               'hora' => 'required | date_format:H:i',
               'patient_id' => 'required',
               'doctor_id' => 'required',
               'valor' => 'required | string',
               'estado' => 'required',
               ]);
            $input = $request->all();
            $appointments->fill($input)->save();
            Session::flash('flash_message', 'Cita editada correctamente!');
            $appointments = Appointment::all();
            return view('appointments/appointmentManager',['list' => $appointments]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "La cita ($id) no ha sido encontrada para editarla!");
            echo "error";
            return redirect()->back();
        }
    }

    public function destroy(Request $request, $id)
    {
        try
        {
            $appointments = Appointment::findOrFail($id);
            $appointments->delete();
            Session::flash('flash_message', 'Cita eliminada correctamente!');
            $appointments = Appointment::all();
            return view('appointments/appointmentManager',['list' => $appointments]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "La cita ($id) no ha sido encontrada para eliminarla!");
            return redirect()->back();
        }
    }

    public function reporteCitas(Request $request)
    {
        $this->validate($request, [
       'fechaInic' => 'required | date_format:Y-m-d',

       ]);
    }
}
