@extends('layouts.layout2')
@section('contenido')
<div class="container-fluid">
    <section class="row" >
    <br>
    <div>
        <h2>Editar datos del paciente</h2>
    </div>
    <br>
    </section>
    <section class="row" >
        <section class="col-md-4">
            <br><br>
            <img src={{ asset('images/paciente.jpg') }}  class="img-responsive" alt="Responsive image">
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
                <div class="panel-heading"><h3 class="panel-title">Formulario de edición de Paciente</h3></div>
                    <div class="panel-body">
                        {!! Form::model($data, ['method' => 'PATCH','route' => ['patients.update', $data->id]])  !!}
                        <div class="form-group">
                            {!! Form::label('lblDocumento', 'Número de Documento:', ['class' => 'control-label']) !!}
                            {!! Form::text('documento', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblTipoDocumento', 'Tipo de Documento:', ['class' => 'control-label']) !!}
                            {!! Form::text('tipo_documento', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblNombres', 'Nombres:', ['class' => 'control-label']) !!}
                            {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblApellidos', 'Apellidos:', ['class' => 'control-label']) !!}
                            {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblSexo', 'Sexo:', ['class' => 'control-label']) !!}
                            <br>
                            <!--{!! Form::text('sexo', null, ['class' => 'form-control']) !!}-->
                            {!! Form::radio('sexo', 'M', true, ['id' => 'radio1']) !!}
                            {!! Form::label('radio1', 'Masculino') !!}
                            <br>
                            {!! Form::radio('sexo', 'F', false, ['id' => 'radio2']) !!}
                            {!! Form::label('radio2', 'Femenino.') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblFechaNac', 'Fecha de Nacimiento:', ['class' => 'control-label']) !!}
                            <!--{!! Form::text('fecha_nacimiento', null, ['class' => 'form-control']) !!}-->
                            {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control'], 'Y-m-d') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblEps', 'EPS:', ['class' => 'control-label']) !!}
                            {!! Form::text('eps', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblTelefono', 'Teléfono:', ['class' => 'control-label']) !!}
                            {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblDireccion', 'Dirección:', ['class' => 'control-label']) !!}
                            {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblAcudiente', 'Nombres Acudiente:', ['class' => 'control-label']) !!}
                            {!! Form::text('nombres_acudiente', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblTelAcudiente', 'Teléfono Acudiente::', ['class' => 'control-label']) !!}
                            {!! Form::text('telefono_acudiente', null, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Guardar datos', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
            </div>
        </section>
@stop
