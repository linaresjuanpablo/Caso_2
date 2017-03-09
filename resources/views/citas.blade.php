@extends('layout')
@section('contenido')

<div class="container">
 <section class="row" >
   <section class="col-md-3">
        <citas>Gestión de citas</citas>
        <img src={{ asset('images/citas.jpg') }}  class="img-responsive" alt="Responsive image">
    </section>

    <section class="col-md-9" style="font-size:30px;text-align:left" >
      <div class="table-responsive">
       <br>
       <table class="table table-bordered  table-fixed">
          <tr>
              <td class="info">Fecha</td>
              <td class="info">Hora</td>
              <td class="info">Paciente doc</td>
              <td class="info">Paciente nombres</td>
              <td class="info">Especialista doc</td>
              <td class="info">Especialista Nombres</td>
              <td class="info">Consultorio</td>
              <td class="info">Estado</td>
              <td class="info">....</td>
          </tr>

          @for ($i = 0; $i < 10; $i++)
           <tr>
              @for ($j = 0; $j < 9; $j++)
               <td class="info">....</td>
              @endfor
           </tr>

          @endfor

         </table>

         <a href={{ $url = route('asigCita') }} class="btn btn-primary">Registrar nueva cita</a>
       </div>



    </section>

</div>

@stop
