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
@if($errors->any())
 <div class="alert alert-danger">
 @foreach($errors->all() as $error)
 <p>{{ $error }}</p>
 @endforeach
 </div>
 @endif
 <div class="panel panel-default">
   <div class="panel-heading"><h3 class="panel-title">Formulario de registro de usuario sistema</h3></div>
    <div class="panel-body">

       <form class="form-horizontal" role="form" method="POST" action="{{ route('users.store') }}">
        {{ csrf_field() }}
       <div class="form-group">
           <label for="nombres" class="col-sm-2 control-label">Nombres:</label>
        <div class="col-sm-10">
         <input id="nombres" type="text" class="form-control" name="nombres" value="{{ old('nombres') }}"  placeholder="Ingrese los nombres del usuario" required autofocus>
        </div>
      </div>

      <div class="form-group">
           <label for="apellidos" class="col-sm-2 control-label">Apellidos:</label>
        <div class="col-sm-10">
                  <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}"  placeholder="Ingrese los apellidos del usuario" required autofocus>

        </div>
      </div>

       <div class="form-group">
           <label for="tipo_usuario" class="col-sm-2 control-label">Tipo usuario:</label>
        <div class="col-sm-10">
         <select class="form-control" id="tipo_usuario" name="tipo_usuario">
         @if(old('tipo_usuario') !='')
           @if(old('tipo_usuario') =='ADMINISTRADOR')
            <option selected>ADMINISTRADOR</option>
            <option >ASISTENTE</option>

           @else
            @if(old('tipo_usuario') =='ASISTENTE')
               <option >ADMINISTRADOR</option>
               <option selected>ASISTENTE</option>
            @endif
          @endif

          @else
            <option selected>ADMINISTRADOR</option>
            <option>ASISTENTE</option>
          @endif
      </select>
        </div>
     </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label">Correo electrónico</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Ingrese el correo electrónico del usuario"  autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

     <div class="form-group">
           <label for="password" class="col-sm-2 control-label">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password"  placeholder="Password usuario"  placeholder="Ingrese la contraseña del usuario">
        </div>
     </div>

     <div class="form-group">

        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary">
                                    Guardar datos
         </button>

        </div>
     </div>

    </form>
     </div>
     </div>



</section>

@stop
