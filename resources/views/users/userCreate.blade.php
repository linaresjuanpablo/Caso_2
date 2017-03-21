@extends('layouts.layout2')
@section('contenido')

<section class="row" >
 <div class="container">
 <section class="col-md-4">
   <citas>Gestión de usuarios del sistema</citas>
        <img src={{ asset('images/users.jpg') }}  class="img-responsive" alt="Responsive image">
 </section>
<section class="col-md-8">
 <div class="panel panel-default">
   <div class="panel-heading"><h3 class="panel-title">Forumulario de registro de citas</h3></div>
    <div class="panel-body">

    {!! Form::open(['route' => 'users.store']) !!}
      <div class="form-group">    {!! Form::label('nombres', 'Nombres', ['class' => 'control-label']) !!}    {!! Form::text('nombres', null, ['class' => 'form-control']) !!} </div>
      <div class="form-group">    {!! Form::label('apellidos', 'Apellidos', ['class' => 'control-label']) !!}    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!} </div>
      <div class="form-group">    {!! Form::label('tipousuario', 'Tipo usuario', ['class' => 'control-label']) !!}    {!! Form::text('tipo_usuario', null, ['class' => 'form-control']) !!} </div>
      <div class="form-group">    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}    {!! Form::text('email', null, ['class' => 'form-control']) !!} </div>
      <div class="form-group">    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}    {!! Form::password('password', ['class' => 'form-control']) !!} </div>
      {!! Form::submit('Create New User', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
   </div>
  </div>
  </section>
</div>
</section>
@stop
