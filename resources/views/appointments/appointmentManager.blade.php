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
            <h2>Gestión de Citas</h2>
            <br>
        </div>
 </section>
 <section class="row" >
     <section class="col-md-2">
        <br>
        <img src={{ asset('images/citas.jpg') }}  class="img-responsive" alt="Responsive image">
    </section>
    <section class="col-md-10" style="font-size:20px;text-align:left;overflow:scroll;height:380px" >
     @if(Session::has('flash_message3'))
                    <article class="alert alert-success">
                        {{ Session::get('flash_message3') }}
                    </article>
                    @endif
    <div class="table-responsive">
        <br>
        <table class="table table-bordered  table-fixed">
            <tr class="info">
                <td>FECHA</td>
                <td>HORA</td>
                <td>PACIENTE</td>
                <td>MEDICO</td>
                <td>VALOR CITA</td>
                <td>ESTADO CITA</td>
                <td>EDITAR</td>
                <td>ELIMINAR</td>
          </tr>
          @foreach($list as $appointment)
            <tr class="active">
                <td> {{ Carbon\Carbon::parse($appointment->fecha)->format('d-m-Y') }} </td>
                <td> {{ $appointment->hora }} </td>
                <td> {{ '(' . $appointment->patient_id . ') ' .$appointment->Patient->nombres .' ' .$appointment->Patient->apellidos }} </td>
                <td> {{ '(' .$appointment->doctor_id .') ' .$appointment->Doctor->nombres .' ' .$appointment->Doctor->apellidos }} </td>
                <td> {{ $appointment->valor }} </td>
                <td> {{ $appointment->estado }} </td>
                <td><a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-primary">Editar datos</a></td>
                <td>{!! Form::open(['method' => 'DELETE', 'route' => ['appointments.destroy', $appointment->id],'onsubmit' => 'return confirm("Está seguro de eliminar el registro?")']) !!}
                    {!! Form::submit('Eliminar la cita', ['class' => 'btn btn-danger']) !!}
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
        <a href={{ $url = route('appointments.create') }} class="btn btn-primary">Registrar nueva cita</a>
    </center>
        <br>
</section>
</div>
@stop
