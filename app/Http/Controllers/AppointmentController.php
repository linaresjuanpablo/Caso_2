<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Appointment;
use App\Patient;
use App\Doctor;
use App\User;
use Session;
use Validator;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments/appointmentManager',['list' => $appointments]);
    }
    public function terminarCita($id)
    {

        $appo=Appointment::findorFail($id);

        $appo->estado='Realizada';
        $appo->save();
           $appointments = Appointment::where('doctor_id','=',$appo->doctor_id)->where('estado','=','Pendiente')->get();
        return view('appointments/appointmentsDoctor',['list' => $appointments]);



    }

    public function appointmentDoctor($idUser)
    {


        $user=User::findorFail($idUser);
        $doctor=Doctor::where('email','=',$user->email)->first();
          $appointments = Appointment::where('doctor_id','=',$doctor->id)->where('estado','=','Pendiente')->get();
        return view('appointments/appointmentsDoctor',['list' => $appointments]);



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

    function buscarCitaDoctor($accion,$cita,$doctor,$fecha,$hora)
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
            $buscarCita=Appointment::where('doctor_id','=',$doctor)
             ->where('fecha','=',$fecha)
             ->where('hora','=',$hora)
             ->where('id','<>',$cita)->first();
           }

        }

        return count($buscarCita);

    }

    function buscarCitaPaciente($accion,$cita,$patient,$fecha,$hora)
    {



        if($accion =='insertar')
       {
          $buscarCita=Appointment::where('patient_id','=',$patient)->
                                   where('fecha','=',$fecha)->
                                   where('hora','=',$hora)->
              first();
        }
       else
       {

         if($accion =='actualizar')
         {
          $buscarCita=Appointment::where('patient_id','=',$patient)
           ->where('fecha','=',$fecha)
           ->where('id','<>',$cita)
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

           if ($this->buscarCitaDoctor('insertar','',$request->doctor_id,$request->fecha,$request->hora)>0)
            {
             $validator->errors()->add('','Ya existe una cita asignada en fecha y hora con el médico seleccionado!!!' . ' Paciente Id:' .$request->patient_id);
            }

             if ($this->buscarCitaPaciente('insertar','',$request->patient_id,$request->fecha,$request->hora) > 0)
             {
               $validator->errors()->add('', 'Ya existe una cita asignada en fecha y hora para el paciente dado!!!');
            }


       });

    }

    if ($validator->fails())
    {

            return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors($validator);
    }


     Appointment::create($input);
     $appointments = Appointment::all();
     Session::flash('flash_message3', 'Cita registrada correctamente!');
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
            Session::flash('flash_message3', "La cita ($id) no ha sido encontrada para editarla!");
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
             'hora' => 'required',
             'patient_id' => 'required',
             'doctor_id' => 'required',
             'valor' => 'required | numeric',
             'estado' => 'required | string',
            ]);


           if (!$validator->fails()) {
              $validator->after(function ($validator) use ($request,$id){
              if ($this->buscarCitaDoctor('actualizar',$id,$request->doctor_id,$request->fecha,$request->hora)>0)
               {
                  $validator->errors()->add('', 'Ya existe una cita asignada en fecha y hora con el médico seleccionado!!!');
                }

              if ($this->buscarCitaPaciente('actualizar',$id,$request->patient_id,$request->fecha,$request->hora)>0)
                {
                 $validator->errors()->add('', 'Ya existe una cita asignada en fecha y hora para el paciente dado!!!');
                }
              });
             }


         if ($validator->fails())
         {


              return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors($validator);


          }

         $input = $request->all();
         $appointment->fill($input)->save();
         Session::flash('flash_message3', 'Cita editada correctamente!');
         $appointments = Appointment::all();
         return view('appointments/appointmentManager',['list' => $appointments]);
       }
      catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message3', "La cita ($id) no ha sido encontrada para editarla!");
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
            Session::flash('flash_message3', 'Cita eliminada correctamente!');
            $appointments = Appointment::all();
            return view('appointments/appointmentManager',['list' => $appointments]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message3', "La cita ($id) no ha sido encontrada para eliminarla!");
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
