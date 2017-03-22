@extends('layouts.layout2')
@section('contenido')


 <div class="container">
  <section class="row" >
  <br>
  <div>
      <h2>Crear nuevo usuario del sistema</h2>

  </div>
  <br>
  </section>
 <section class="row" >
 <section class="col-md-4">
   <br><br>
        <img src={{ asset('images/users.jpg') }}  class="img-responsive" alt="Responsive image">
 </section>
<section class="col-md-8">
 <div class="panel panel-default">
   <div class="panel-heading"><h3 class="panel-title">Forumulario de registro de usuario sistema</h3></div>
    <div class="panel-body">
     <form class="form-horizontal" role="form" method="POST" action="{{ route('users.store') }}">
        {{ csrf_field() }}
       <div class="form-group">
           <label for="nombres" class="col-sm-2 control-label">Nombres:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nombres" name="nombres"  placeholder="Nombres del usuario">
        </div>
      </div>

      <div class="form-group">
           <label for="apellidos" class="col-sm-2 control-label">Apellidos:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="apellidos" name="apellidos"  placeholder="Apellidos del usuario">
        </div>
      </div>

       <div class="form-group">
           <label for="tipo_usuario" class="col-sm-2 control-label">Tipo usuario:</label>
        <div class="col-sm-10">
         <select class="form-control" id="tipo_usuario" name="tipo_usuario"  placeholder="Seleccione tipo usuario" >
            <option>ADMINISTRADOR</option>
            <option>ASISTENTE</option>
          </select>

        </div>
     </div>

      <div class="form-group">
           <label for="tipo_usuario" class="col-sm-2 control-label">Tipo usuario:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email"  placeholder="Correo electrónico usuario">
        </div>
     </div>

     <div class="form-group">
           <label for="password" class="col-sm-2 control-label">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password"  placeholder="Password usuario">
        </div>
     </div>

     <div class="form-group">

        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary">
                                    Gurdar datos
         </button>

        </div>
     </div>

    </form>
     </div>
     </div>



</section>

@stop
