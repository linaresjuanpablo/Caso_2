@extends('layouts.layout2')
@section('contenido')
<div class="container">
    <section class="row" >

        <div>
            <h2>Reporte de médicos que atendieron citas en un periodo</h2>
        </div>
        <br>
    </section>
    <section class="row" >
        <section class="col-md-3">
            <br>
            <img src={{ asset('images/reportes.jpg') }}  class="img-responsive" alt="Responsive image">
        </section>
        <section class="col-md-9">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
 <div class="panel panel-default">
   <div class="panel-heading"></div>
    <div class="panel-body">
        <div class="form-inline">
     <!--<form class="form-horizontal" role="form" method="POST" action="{{ route('patients.store') }}">-->
        {!! Form::open(['route' => 'repRes']) !!}
            <div class="form-group">
            {!! Form::label('lblfecha1', 'Fecha inicial:') !!}
            @if(!empty($old))
            {!! Form::date('fecha_inicial',$old->fecha_inicial, ['class' => 'form-control'], 'Y-m-d') !!}
            @else
             {!! Form::date('fecha_inicial',null, ['class' => 'form-control'], 'Y-m-d') !!}
             @endif

            </div>

        <div class="form-group">
          {!! Form::label('lblfecha1', 'Fecha final:') !!}
            @if(!empty($old))
            {!! Form::date('fecha_final',$old->fecha_final, ['class' => 'form-control'], 'Y-m-d') !!}
            @else
             {!! Form::date('fecha_final',null, ['class' => 'form-control'], 'Y-m-d') !!}
             @endif

        </div>
        {!! Form::submit('Realizar consulta', ['class' => 'btn btn-primary ' ] ) !!}
     {!! Form::close() !!}


    <!--</form>-->
    </div>
   </div>

     </div>

     @if(!empty($list))
     @if(count($list)>0)
    <h3>Se obtuvieron {{ count($list) . ' resultados'}} </h3><br>
     @foreach($list as $doctor)
     <strong>
     <p> {{ "Especialista:" . "($doctor->id) "  .$doctor->nombres . ' ' .$doctor->apellidos ." --- Cantidad de citas atendidas $doctor->num_appointments" }}</p></strong>
      @if($doctor->num_appointments >0)
      <div class="table-responsive">
       <table class="table">
        <tr>
        <th>cita_id</th>
        <th>cita_fecha</th>
        <th>cita_hora</th>
        <th>paciente_id</th>
        </tr>
        @foreach($doctor->appointments as $appo)
        <tr>
         <td> {{ $appo->id}} </td>
         <td> {{ $appo->fecha}} </td>
         <td> {{ $appo->hora}} </td>
         <td> {{ '(' .$appo->patient_id .') ' .$appo->Patient->nombres .' ' .$appo->Patient->apellidos }} </td>
         </tr>
     @endforeach

  </table>
</div>
     @endif


     @endforeach
     @else
     <h2>Ningún resultado para la consulta realizada...</h2>
     @endif
     @endif
    </section>

@stop
