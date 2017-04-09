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
            <h2>Citas pendientes a realizar</h2>
            <br>
        </div>
 </section>
 <section class="row" >
     <section class="col-md-2">
        <br>
        <img src={{ asset('images/medico.jpg') }}  class="img-responsive" alt="Responsive image">
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
            <tr>
                <td>fecha</td>
                <td>hora</td>
                <td>paciente</td>
                <td>estado</td>
                <td>Terminar cita</td>
               </tr>
          @foreach($list as $appointment)
            <tr>
                <td> {{ $appointment->fecha }} </td>
                <td> {{ $appointment->hora }} </td>
                <td> {{ '(' . $appointment->patient_id . ') ' .$appointment->Patient->nombres .' ' .$appointment->Patient->apellidos }} </td>
                <td> {{ $appointment->estado }} </td>
                <td><a href="{{ route('endAppo', $appointment->id) }}" class="btn btn-primary">Terminar cita</a></td>

            </tr>
          @endforeach
        </table>
    </div>
    </section>
</section>
<section class="row">
    <br><br>
</section>
</div>
@stop
