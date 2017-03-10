@extends('layout')
@section('contenido')

<div class="container">
 <section class="row" >
   <section class="col-md-3">
       <br><br>
        <citas>Gestión de pacientes</citas>
        <img src={{ asset('images/paciente.jpg') }}  class="img-responsive" alt="Responsive image">
    </section>

    <section class="col-md-9" style="font-size:30px;text-align:left" >
      <div class="table-responsive">
       <br>
       <table class="table table-bordered  table-fixed">
          <tr>
              <td class="info">Documento</td>
              <td class="info">Nombres</td>
              <td class="info">Apellidos doc</td>
              <td class="info">Sexo</td>
              <td class="info">Fecha de nacimiento</td>
              <td class="info">Eps</td>
              <td class="info">Dirección</td>
              <td class="info">Acudiente</td>
              <td class="info">Teléfono acudiente</td>
              <td class="info">....</td>
          </tr>

          @for ($i = 0; $i < 10; $i++)
           <tr>
              @for ($j = 0; $j < 10; $j++)
               <td class="info">....</td>
              @endfor
           </tr>

          @endfor

         </table>

         <a href={{ $url = route('Gpacientes') }} class="btn btn-primary">Registrar nueva cita</a>
         <a href={{ $url = route('admin') }} class="btn btn-primary"><-- Regresar</a>
       </div>



    </section>

</div>

@stop
