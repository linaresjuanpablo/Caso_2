@extends('layouts.layout2')
@section('contenido')
<script>
    function ConfirmDelete()
    {
        var x = confirm("Está seguro de eliminar el registro?");
        if (x)
            return true;
        else
        return false;
    }
</script>
<div class="container-fluid">
    <section class="row" >
        <div>
            <h2>Gestión de pacientes</h2>
            <br>
        </div>
 </section>
 <section class="row" >
     <section class="col-md-2">
        <br>
        <img src={{ asset('images/paciente.jpg') }}  class="img-responsive" alt="Responsive image">
    </section>
    <section class="col-md-9" style="font-size:12px;text-align:left;overflow:scroll;height:380px" >
    <div class="table-responsive">
        <br>
        <table class="table table-bordered  table-fixed">
            <tr>
                <td>Número de Documento:</td>
                <td>Tipo de Documento</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Sexo</td>
                <td>Fecha de Nacimiento</td>
                <td>EPS</td>
                <td>Teléfono</td>
                <td>Dirección</td>
                <td>Nombres Acudiente</td>
                <td>Telefono Acudiente</td>
                <td>Editar</td>
                <td>Eliminar</td>
          </tr>
          @foreach($list as $patient)
            <tr>
                <td> {{ $patient->documento }} </td>
                <td> {{ $patient->tipo_documento }} </td>
                <td> {{ $patient->nombres }} </td>
                <td> {{ $patient->apellidos }} </td>
                <td> {{ $patient->sexo }} </td>
                <td> {{ $patient->fecha_nacimiento }} </td>
                <td> {{ $patient->eps }} </td>
                <td> {{ $patient->telefono }} </td>
                <td> {{ $patient->direccion }} </td>
                <td> {{ $patient->nombres_acudiente }} </td>
                <td> {{ $patient->telefono_acudiente }} </td>
                <td><a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">Editar datos</a></td>
                <td>{!! Form::open(['method' => 'DELETE', 'route' => ['patients.destroy', $patient->id],'onsubmit' => 'return confirm("Está seguro de eliminar el registro?")']) !!}
                    {!! Form::submit('Eliminar el Paciente', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
          @endforeach
        </table>
    </div>
    </section>
</section>
<section class="row">
    <br>
    <center>
        <a href={{ $url = route('patients.create') }} class="btn btn-primary">Registrar nuevo paciente</a>
    </center>
        <br>
</section>
</div>
@stop
