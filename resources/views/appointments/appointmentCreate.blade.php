@extends('layouts.layout2')
@section('contenido')
<div class="container">
    <section class="row" >
        <br>
        <div>
            <h2>Crear nueva cita</h2>
        </div>
        <br>
    </section>
    <section class="row" >
        <section class="col-md-4">
            <br><br>
            <img src={{ asset('images/citas.jpg') }}  class="img-responsive" alt="Responsive image">
        </section>
        <section class="col-md-8">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
 <div class="panel panel-default">
   <div class="panel-heading"><h3 class="panel-title">Formulario de registro de citas</h3></div>
    <div class="panel-body">
        <div class="form-horizontal">
     <!--<form class="form-horizontal" role="form" method="POST" action="{{ route('patients.store') }}">-->
        {!! Form::open(['route' => 'appointments.store']) !!}
        <!--{{ csrf_field() }}-->
        <div class="form-group">
            {!! Form::label('lblFecha', 'Fecha:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::date('fecha', null, ['class' => 'form-control'], 'Y-m-d') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblHora', 'Hora:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::time('hora', null, ['class' => 'form-control'], 'H:i') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('patient_id', 'Paciente:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::select('patient_id', $patient, null, [ 'class' =>  'form-control',]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('doctor_id', 'Medico:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::select('doctor_id', $doctor, null, [ 'class' =>  'form-control',]) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblValor', 'Valor:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
              {!! Form::text('valor', $value = null, ['class' => 'form-control', 'placeholder' => 'Valor']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblEstado', 'Estado:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::select('estado', array('' => 'Seleccione...', 'Pendiente' => 'Pendiente', 'Realizada' => 'Realizada', 'Cancelada' => 'Cancelada'), null, [ 'class' =>  'form-control',]) !!}
            </div>
        </div>
        <div class="form-group">
            <center> {!! Form::submit('Guardar datos', ['class' => 'btn btn-primary ' ] ) !!}
            </center>
        </div>
        {!! Form::close() !!}
    <!--</form>-->
    </div>
   </div>
     </div>
        </section>
    </section>
</div>
@stop
