@extends('layout')
@section('contenido')

<div class="container">
 <section class="row" >
   <section class="col-md-3" >
        <br><br>
       <center>

        <img src={{ asset('images/medico.jpg') }}  class="img-responsive" alt="Responsive image"><br>
        <a href="">Gestión de Médicos</a><br>
        </center>
    </section>

    <section class="col-md-3" >
       <br><br>
        <center>
        <a href={{ $url = route('pacientes') }}><img src={{ asset('images/menupaciente.png') }}   class="img-responsive" alt="Responsive image"></a><br>
         <a href={{ $url = route('pacientes') }}>Gestión de pacientes</a></center>
    </section>

     <section class="col-md-3">
        <br><br>
        <center>
        <a href={{ $url = route('citas') }}><img src={{ asset('images/menucitas.jpg') }}  href={{ $url = route('citas') }} class="img-responsive" alt="Responsive image"><br></a>
        <a href={{ $url = route('citas') }}>Gestión de citas</a></center>
    </section>

     <reportes class="col-md-3">
        <br><br><br><br>
        <center>
        <img src={{ asset('images/menureportes.jpg')  }}   class="img-responsive" alt="Responsive image"><br>
        <a href="">Reportes</a> </center>
    </section>

    </section>


</div>

@stop
