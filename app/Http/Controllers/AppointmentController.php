<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use Session;

class AppointmentController extends Controller
{
    public function adminAppointment()
    {
        $appointments = Appointment::all();
        return view('appointments/appointmentManager',['list' => $appointments]);
    }

    public function create(Request $request)
    {
        return view('appointments.appointmentCreate');
    }

    public function store(Request $request)
    {
       $input = $request->all();
       $this->validate($request, [
       'fecha' => 'required | date_format:Y-m-d',
       'hora' => 'required | date_format:h:i',
       'paciente_id' => 'required',
       'medico_id' => 'required',
       'valor' => 'required | string',
       'estado' => 'required',
       ]);
       Appointment::create($input);
       Session::flash('flash_message', 'Cita registrada correctamente!');
       $appointments = Appointment::all();
       return view('appointments/appointmentManager',['list' => $appointments]);
   }

    public function show(Request $request, $id)
    {

    }

    public function edit(Request $request, $id)
    {
        try
        {
            $appointments = Appointment::findOrFail($id);
            return view('appointments/appointmentEdit', ['data' => $appointments]);
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
               'hora' => 'required | date_format:h:i',
               'paciente_id' => 'required',
               'medico_id' => 'required',
               'valor' => 'required | string',
               'estado' => 'required',
               ]);
            $input = $request->all();
            $appointments->fill($input)->save();
            Session::flash('flash_message', 'Cita editada correctamente!');
            $appointments = Appointment::all();
            return view('appointments/appointmentManager',['list' => $patients]);
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
}
