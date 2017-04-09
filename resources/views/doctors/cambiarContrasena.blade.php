@extends('layouts.layout2')
@section('contenido')
<div class="container">
    <section class="row" >

        <div>
            <h2>Cambiar contraseña</h2>
        </div>
        <br>
    </section>
    <section class="row" >
        <section class="col-md-3">
            <br>
            <img src={{ asset('images/medico.jpg') }}  class="img-responsive" alt="Responsive image">
        </section>
        <section class="col-md-9">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            @if(Session::has('flash_message3'))
                    <article class="alert alert-success">
                        {{ Session::get('flash_message3') }}
                    </article>
                    @endif

 <div class="panel panel-default">
   <div class="panel-heading"></div>
    <div class="panel-body">
        <div class="form">
     <!--<form class="form-horizontal" role="form" method="POST" action="{{ route('patients.store') }}">-->

           {!! Form::open(['route' => ['cambiarPass',Auth::user()->id]])  !!}
            <div class="form-group">
            {!! Form::label('lblNpass', 'Nueva contraseña:') !!}

            {!! Form::password('newPass', ['class' => 'form-control'])  !!}

            </div>

            <div class="form-group">
            {!! Form::label('lblNpass', 'Repita la contraseña:') !!}

            {!! Form::password('rePass', ['class' => 'form-control'])  !!}

            </div>



        {!! Form::submit('Cambiar contraseña', ['class' => 'btn btn-primary ' ] ) !!}
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
