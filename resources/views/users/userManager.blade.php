@extends('layouts.layout2')
@section('contenido')

<div class="container">
 <section class="row" >
     <div>
         <h2>Gestión de usuarios del sistema</h2>
         <br>

     </div>
 </section>

 <section class="row" >

   <section class="col-md-3">
       <br>
       <img src={{ asset('images/users.jpg') }}  class="img-responsive" alt="Responsive image">
    </section>

    <section class="col-md-9" style="font-size:20px;text-align:left;overflow:scroll;height:380px" >
      <div class="table-responsive">
       <br>

       <table class="table table-bordered  table-fixed">
          <tr>
              <td>Nombres</td>
              <td>Apellidos</td>
              <td >Tipo usuario</td>
              <td>E-mail</td>

          </tr>

          @for ($i = 0; $i < 10; $i++)
           <tr>
              @for ($j = 0; $j < 4; $j++)
               <td >....</td>
              @endfor
           </tr>

          @endfor

         </table>
         </section>


       </div>



    </section>

    <section class="row">
       <br>
       <center>
        <a href={{ $url = route('asigCita') }} class="btn btn-primary">Registrar nuevo usuario</a>
         <a href={{ $url = route('admin') }} class="btn btn-primary"><-- Regresar</a>
        </center>
        <br>
    </section>

</div>

@stop
