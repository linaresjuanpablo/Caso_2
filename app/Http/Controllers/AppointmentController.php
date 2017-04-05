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
        $patients = Patient::all('id','nombres','apellidos');
        $patientsArray = array('' => 'Seleccione...');
        foreach ($patients as $patient) {
            $valor='(' .$patient->id .') '. $patient->nombres . ' ' . $patient->apellidos;
            $patientsArray += array($patient->id => $valor);
        }

        $doctors = Doctor::all('id','nombres','apellidos');
        $doctorsArray = array('' => 'Seleccione...');
        foreach ($doctors as $doctor) {
            $valor='(' .$doctor->id .') '. $doctor->nombres . ' ' . $doctor->apellidos;
            $doctorsArray += array($doctor->id => $valor);
        }

        return view('appointments.appointmentCreate', ['patient' => $patientsArray, 'doctor' => $doctorsArray]);
    }

    function buscarCitaDoctor($accion,$doctor,$fecha,$hora)
    {
       if($accion == 'insertar')
       {
        $buscarCita=Appointment::where('doctor_id','=',$doctor)
           ->where('fecha','=',$fecha)
           ->where('hora','=',$hora)->first();
       }
       else
       {
         if($accion == 'actualizar')
          {
            $buscarCita=Appointment::where('doctor_id','<>',$doctor)
             ->where('fecha','=',$fecha)
             ->where('hora','=',$hora)->first();
           }

        }

        return count($buscarCita);

    }

    function buscarCitaPaciente($accion,$patient,$fecha,$hora)
    {
       if($accion =='insertar')
       {
          $buscarCita=Appointment::where('patient_id','=',$patient)
           ->where('fecha','=',$fecha)
           ->where('hora','=',$hora)->first();
       }
       else
       {
         if($accion =='insertar')
         {
          $buscarCita=Appointment::where('patient_id','<>',$patient)
           ->where('fecha','=',$fecha)
           ->where('hora','=',$hora)->first();
         }

        }

        return count($buscarCita);

    }

    public function store(Request $request)
    {
       $input = $request->all();
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

           if ($this->buscarCitaDoctor('insertar',$request->doctor_id,$request->fecha,$request->hora)>0) {
             $validator->errors()->add('', 'Ya existe una cita asignada en fecha y hora con el médico seleccionado!!!');
            }

            if ($this->buscarCitaPaciente('insertar',$request->patient_id,$request->fecha,$request->hora)>0) {
             $validator->errors()->add('', 'Ya existe una cita asignada en fecha y hora para el paciente dado!!!');
            }
       });

    }


        if ($validator->fails()) {

            return redirect()->to($this->getRedirectUrl())
                    ->withInput($request->input())
                    ->withErrors($validator);
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
        $patients = Patient::all('id','nombres','apellidos');
        $patientsArray = array('' => 'Seleccione...');
        foreach ($patients as $patient) {
            $valor='(' .$patient->id .') '. $patient->nombres . ' ' . $patient->apellidos;
            $patientsArray += array($patient->id => $valor);
        }

        $doctors = Doctor::all('id','nombres','apellidos');
        $doctorsArray = array('' => 'Seleccione...');
        foreach ($doctors as $doctor) {
            $valor='(' .$doctor->id .') '. $doctor->nombres . ' ' . $doctor->apellidos;
            $doctorsArray += array($doctor->id => $valor);
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
            $appointment = Appointment::findOrFail($id);
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
              if ($this->buscarCitaDoctor('insertar',$request->id,$request->doctor_id,$request->fecha,$request->hora)>0) {
                  $validator->errors()->add('', 'Ya existe una cita asignada en fecha y hora con el médico seleccionado!!!');
                }

              if ($this->buscarCitaPaciente('insertar',$request->id,$request->patient_id,$request->fecha,$request->hora)>0) {
                $validator->errors()->add('', 'Ya existe una cita asignada en fecha y hora para el paciente dado!!!');
                }
              });

             }


         if ($validator->fails())
         {


              return redirect()->to($this->getRedirectUrl())
                    ->withInput($request->input())
                    ->withErrors($validator);


          }

         $input = $request->all();
         $appointment->fill($input)->save();
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
