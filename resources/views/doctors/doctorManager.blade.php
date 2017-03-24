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
            <h2>Gestión de Medicos</h2>
            <br>
        </div>
 </section>
 <section class="row" >
     <section class="col-md-2">
        <br>
        <img src={{ asset('images/medico.jpg') }}  class="img-responsive" alt="Responsive image">
    </section>
    <section class="col-md-9" style="font-size:20px;text-align:left;overflow:scroll;height:380px" >
    <div class="table-responsive">
        <br>
        <table class="table table-bordered  table-fixed">
            <tr>
                <td>Número de Documento:</td>
                <td>Tipo de Documento</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Especialidad</td>
                <td>Email</td>
                <td>Teléfono</td>
                <td>Editar</td>
                <td>Eliminar</td>
          </tr>
          @foreach($list as $doctor)
            <tr>
                <td> {{ $doctor->documento }} </td>
                <td> {{ $doctor->tipo_documento }} </td>
                <td> {{ $doctor->nombres }} </td>
                <td> {{ $doctor->apellidos }} </td>
                <td> {{ $doctor->especialidad }} </td>
                <td> {{ $doctor->email }} </td>
                <td> {{ $doctor->telefono }} </td>

                <td><a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-primary">Editar datos</a></td>
                <td>{!! Form::open(['method' => 'DELETE', 'route' => ['doctors.destroy', $doctor->id],'onsubmit' => 'return confirm("Está seguro de eliminar el registro?")']) !!}
                    {!! Form::submit('Eliminar el Medico', ['class' => 'btn btn-danger']) !!}
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
        <a href={{ $url = route('doctors.create') }} class="btn btn-primary">Registrar nuevo Medico</a>
    </center>
        <br>
</section>
</div>
@stop
