@extends('layouts.layout2')
@section('contenido')
<div class="container-fluid">
    <section class="row" >
    <br>
    <div>
        <h2>Editar datos del Medico</h2>
    </div>
    <br>
    </section>
    <section class="row" >
        <section class="col-md-4">
            <br><br>
            <img src={{ asset('images/medico.jpg') }}  class="img-responsive" alt="Responsive image">
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
                <div class="panel-heading"><h3 class="panel-title">Formulario de edición de Medico</h3></div>
                    <div class="panel-body">
                        {!! Form::model($data, ['method' => 'PATCH','route' => ['doctors.update', $data->id]])  !!}
                        <div class="form-group">
                            {!! Form::label('lblDocumento', 'Número de Documento:', ['class' => 'control-label']) !!}
                            {!! Form::text('documento', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblTipoDocumento', 'Tipo de Documento:', ['class' => 'control-label']) !!}
                           {!! Form::select('tipo_documento', ['CC' => 'Cédula ciudadanía', 'TI' => 'Tarjeta de identidad', 'RC' => 'Registro civil', 'CE' => 'Cédula de extranjería'], null, ['class' => 'form-control','placeholder' => 'seleccione un tipo de  documento...']) !!}
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
                            {!! Form::label('lblEspecialidad', 'Especialidad:', ['class' => 'control-label']) !!}
                            {!! Form::text('especialidad', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblEmail', 'Email:', ['class' => 'control-label']) !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lblTelefono', 'Teléfono:', ['class' => 'control-label']) !!}
                            {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Guardar datos', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
            </div>
        </section>
@stop
