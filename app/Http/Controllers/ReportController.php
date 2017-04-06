<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Doctor;
use Session;

class ReportController extends Controller
{
    public function reports()
    {

      return view('reports/report1');

    }

    public function repCitasFecha(Request $request)
    {

     $this->validate($request, [
       'fecha_inicial' => 'required | date',
       'fecha_final' => 'required | date',
       ]);
     /*$list=Doctor::where('appointments',function($q) use ($request)
         {
            $q->whereBetween('fecha', [$request->fecha_inicial,$request->fecha_final])
               ->where('estado','=','Realizada');
         })->get();*/



        $list=Doctor::with(['appointments'=>function($q) use ($request)
         {
            $q->whereBetween('fecha', [$request->fecha_inicial,$request->fecha_final])
               ->where('estado','=','Realizada');
         }])->get();

    return view('reports/report1',['list' => $list,'old' => $request]);
    }
}
