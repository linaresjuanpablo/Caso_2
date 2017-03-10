@extends('layout')
@section('contenido')
<div class="container">
  <section class="row" >
    <section class="col-md-3">
      <citas>Gestión de pacientes</citas>
        <img src={{ asset('images/paciente.jpg') }}  class="img-responsive" alt="Responsive image">
    </section>
    <section class="col-md-9" style="font-size:20px;text-align:left" >
    <br>
    <div class="panel panel-default">
      <div class="panel-heading"><h3 class="panel-title">Formulario de registro de pacientes</h3></div>
        <div class="panel-body">
          {!! Form::open(['url' => '/', 'class' => 'form-horizontal']) !!}
          <div class="form-group">
            {!! Form::label('lblDocumento', 'Número de Documento:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
              {!! Form::text('txtNumDocumento', $value = null, ['class' => 'form-control', 'placeholder' => 'Numero de Documento']) !!}
            </div>
          </div>
          <div class="form-group">
            {!! Form::label('lblNombres', 'Nombres:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
              {!! Form::text('txtNombres', $value = null, ['class' => 'form-control', 'placeholder' => 'Nombres']) !!}
            </div>
          </div>
          <div class="form-group">
            {!! Form::label('lblApellidos', 'Apellidos:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
              {!! Form::text('txtApellidos', $value = null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
            </div>
          </div>
          <div class="form-group">
            {!! Form::label('lblSexo', 'Sexo:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
              {!! Form::radio('sexo', 'male', true, ['id' => 'radio1']) !!}
              {!! Form::label('radio1', 'Masculino') !!}
              <br>
              {!! Form::radio('sexo', 'female', false, ['id' => 'radio2']) !!}
              {!! Form::label('radio2', 'Femenino.') !!}
            </div>
          </div>
          <div class="form-group">
            {!! Form::label('lblFechaNac', 'Fecha de Nacimiento:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
              {!! Form::text('txtFechaNac', $value = null, ['class' => 'form-control', 'placeholder' => 'DD/MM/AAAA']) !!}
            </div>
          </div>
          <div class="form-group">
            {!! Form::label('lblEps', 'EPS:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
              {!! Form::text('txtEps', $value = null, ['class' => 'form-control', 'placeholder' => 'EPS']) !!}
            </div>
          </div>
          <div class="form-group">
            {!! Form::label('lblTelefono', 'Teléfono:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
              {!! Form::text('txtTelefono', $value = null, ['class' => 'form-control', 'placeholder' => 'Telefono']) !!}
            </div>
          </div>
          <div class="form-group">
            {!! Form::label('lblDireccion', 'Dirección:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
              {!! Form::text('txtDireccion', $value = null, ['class' => 'form-control', 'placeholder' => 'Direccion']) !!}
            </div>
          </div>
          <div class="form-group">
            {!! Form::label('lblAcudiente', 'Acudiente:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
              {!! Form::text('txtAcudiente', $value = null, ['class' => 'form-control', 'placeholder' => 'Acudiente']) !!}
            </div>
          </div>
          <div class="form-group">
            {!! Form::label('lblTelAcudiente', 'Teléfono Acudiente:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
              {!! Form::text('txtTelAcudiente', $value = null, ['class' => 'form-control', 'placeholder' => 'Teléfono Acudiente']) !!}
            </div>
          </div>
          <div class="form-group">
            <center> {!! Form::submit('Guardar datos', ['class' => 'btn btn-primary ' ] ) !!}
            <a href={{ $url = route('pacientes') }} class="btn btn-primary"><-- Regresar</a>
            </center>
           </div>
           {!! Form::close() !!}
        </div>
    </div>
    </section>
  </section>
</div>
@stop
