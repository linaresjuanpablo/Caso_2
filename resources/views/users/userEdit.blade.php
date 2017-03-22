@extends('layouts.layout2')
@section('contenido')


 <div class="container-fluid">
  <section class="row" >
  <br>
  <div>
      <h2>Editar datos de usuario del sistema</h2>

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
   <div class="panel-heading"><h3 class="panel-title">Formulario de edición de usuario sistema</h3></div>
    <div class="panel-body">
     {!! Form::model($data, ['method' => 'PATCH','route' => ['users.update', $data->id]])  !!}

     <div class="form-group">
         {!! Form::label('nombres', 'Nombres', ['class' => 'control-label']) !!}
         {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('apellidos', 'Apellidos', ['class' => 'control-label']) !!}
         {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('tipo_usuario', 'Tipo usuario', ['class' => 'control-label']) !!}
         {!! Form::text('tipo_usuario', null, ['class' => 'form-control']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
         {!! Form::text('email', null, ['class' => 'form-control']) !!}
     </div>
    <div class="form-group">
 {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
 {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Guardar datos', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

     </div>
     </div>



</section>

@stop