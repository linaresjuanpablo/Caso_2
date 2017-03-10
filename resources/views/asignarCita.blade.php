@extends('layout')
@section('contenido')



    <div class="container">
     <section class="row" >
      <section class="col-md-3">
        <citas>Gestión de citas</citas>

        <img src={{ asset('images/citas.jpg') }}  class="img-responsive" alt="Responsive image">
      </section>

        <section class="col-md-9" style="font-size:20px;text-align:left" >
          <br>

        <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title">Forumulario de registro de citas</h3></div>
              <div class="panel-body">
                {!! Form::open(['url' => '/', 'class' => 'form-horizontal']) !!}

                 <div class="form-group">
                  {!! Form::label('fecha', 'Fecha cita:', ['class' => 'col-lg-3 control-label']) !!}
                   <div class="col-lg-9">
                     {!! Form::text('txtFecha', $value = null, ['class' => 'form-control', 'placeholder' => 'dd/mm/aaaa']) !!}
                  </div>
                 </div>

                 <div class="form-group">
                  {!! Form::label('Hora', 'Hora cita:', ['class' => 'col-lg-3 control-label']) !!}
                   <div class="col-lg-9">
                     {!! Form::text('txtHora', $value = null, ['class' => 'form-control', 'placeholder' => 'hh:mm']) !!}
                  </div>
                 </div>

                 <div class="form-group">
                  {!! Form::label('consultorio', 'Consultorio:', ['class' => 'col-lg-3 control-label']) !!}
                   <div class="col-lg-9">
                     {!! Form::text('txtCons', $value = null, ['class' => 'form-control', 'placeholder' => 'Numero conultorio']) !!}
                  </div>
                 </div>

                 <div class="form-group">
                  {!! Form::label('paciente', 'Paciente:', ['class' => 'col-lg-3 control-label']) !!}
                   <div class="col-lg-9">
                     {!! Form::text('txtPac', $value = null, ['class' => 'form-control', 'placeholder' => 'Documento del paciente']) !!}
                  </div>
                 </div>

                  <div class="form-group">
                  {!! Form::label('especialista', 'Especialista:', ['class' => 'col-lg-3 control-label']) !!}
                   <div class="col-lg-9">
                     {!! Form::text('txtEspc', $value = null, ['class' => 'form-control', 'placeholder' => 'Documento del médico especialista']) !!}

                  </div>
                 </div>

                  <div class="form-group">
                  {!! Form::label('valor', 'Valor:', ['class' => 'col-lg-3 control-label']) !!}
                   <div class="col-lg-9">
                     {!! Form::text('txtVal', $value = null, ['class' => 'form-control', 'placeholder' => 'Valor de la cita']) !!}
                  </div>
                 </div>

                  <div class="form-group">
                  {!! Form::label('estado', 'Estado cita:', ['class' => 'col-lg-3 control-label']) !!}
                   <div class="col-lg-9">

                    {!!  Form::select('select', ['A' => 'Por atender', 'T' => 'Terminada', 'C' => 'Cancelada', ],  'S', ['class' => 'form-control' ]) !!}
                  </div>
                 </div>


                  <div class="form-group">
                     <center> {!! Form::submit('Guardar datos', ['class' => 'btn btn-primary ' ] ) !!}
                     <a href={{ $url = route('citas') }} class="btn btn-primary"><-- Regresar</a>
                       </center>

                  </div>
                {!! Form::close() !!}
              </div>
            </div>

</div>







    </section>
    </section>

      </div>




@stop
