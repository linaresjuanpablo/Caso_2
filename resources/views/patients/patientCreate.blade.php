@extends('layouts.layout2')
@section('contenido')
<div class="container">
    <section class="row" >
        <br>
        <div>
            <h2>Crear nuevo Paciente</h2>
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
   <div class="panel-heading"><h3 class="panel-title">Formulario de registro de paciente</h3></div>
    <div class="panel-body">
        <div class="form-horizontal">
     <!--<form class="form-horizontal" role="form" method="POST" action="{{ route('patients.store') }}">-->
        {!! Form::open(['route' => 'patients.store']) !!}
        <!--{{ csrf_field() }}-->
        <div class="form-group">
            {!! Form::label('lblDocumento', 'Número de Documento:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::text('documento', $value = null, ['class' => 'form-control', 'placeholder' => 'Numero de Documento']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblTipoDocumento', 'Tipo de Documento:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::select('tipo_documento', ['CC' => 'Cédula ciudadanía', 'TI' => 'Tarjeta de identidad', 'RC' => 'Registro civil', 'CE' => 'Cédula de extranjería'], null, ['class' => 'form-control','placeholder' => 'seleccione un tipo de  documento...']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblNombres', 'Nombres:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::text('nombres', $value = null, ['class' => 'form-control', 'placeholder' => 'Nombres']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblApellidos', 'Apellidos:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
              {!! Form::text('apellidos', $value = null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblSexo', 'Sexo:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::radio('sexo', 'M', true, ['id' => 'radio1']) !!}
                {!! Form::label('radio1', 'Masculino') !!}
                <br>
                {!! Form::radio('sexo', 'F', false, ['id' => 'radio2']) !!}
                {!! Form::label('radio2', 'Femenino.') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblFechaNac', 'Fecha de Nacimiento:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                <!--{!! Form::text('fecha_nacimiento', $value = null, ['class' => 'form-control', 'placeholder' => 'DD/MM/AAAA']) !!}-->
                <!--{!! Form::date('fecha_nacimiento', \Carbon\Carbon::now()) !!}-->
                {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control'], 'Y-m-d') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblEps', 'EPS:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::text('eps', $value = null, ['class' => 'form-control', 'placeholder' => 'EPS']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblTelefono', 'Teléfono:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::text('telefono', $value = null, ['class' => 'form-control', 'placeholder' => 'Telefono']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblDireccion', 'Dirección:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::text('direccion', $value = null, ['class' => 'form-control', 'placeholder' => 'Direccion']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblAcudiente', 'Nombres Acudiente:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::text('nombres_acudiente', $value = null, ['class' => 'form-control', 'placeholder' => 'Nombres Acudiente']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('lblTelAcudiente', 'Teléfono Acudiente:', ['class' => 'col-lg-3 control-label']) !!}
            <div class="col-lg-9">
                {!! Form::text('telefono_acudiente', $value = null, ['class' => 'form-control', 'placeholder' => 'Teléfono Acudiente']) !!}
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
