@extends('layouts.layout2')
@section('contenido')
<div class="container-fluid">
 <section class="row" >
     <div>
         <h2>Gestión de usuarios del sistema</h2>
         <br>
     </div>
 </section>
 <section class="row" >
   <section class="col-md-2">
        <br>
       <img src={{ asset('images/users.jpg') }}  class="img-responsive" alt="Responsive image">
    </section>
    <section class="col-md-9" style="font-size:20px;text-align:left;overflow:scroll;height:380px" >
      @if(Session::has('flash_message'))
                    <article class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </article>
                    @endif
      <div class="table-responsive">
       <br>
       <table class="table table-bordered  table-fixed">
          <tr>
              <td>Nombres</td>
              <td>Apellidos</td>
              <td >Tipo usuario</td>
              <td>E-mail</td>
              <td>Editar</td>
              <td>Eliminar</td>
          </tr>
          @foreach($list as $user)
           <tr>
             <td> {{ $user->nombres }} </td>
             <td> {{ $user->apellidos }} </td>
             <td> {{ $user->tipo_usuario }} </td>
             <td> {{ $user->email }} </td>
             <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar datos</a></td>
               <td>{!! Form::open([
                'method' => 'DELETE',
                'route' => ['users.destroy', $user->id],
                'onsubmit' => 'return confirm("Está seguro de eliminar el registro?")',
               ]) !!}
               {!! Form::submit('Eliminar usuario', ['class' => 'btn btn-danger']) !!}
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
        <a href={{ $url = route('users.create') }} class="btn btn-primary">Registrar nuevo usuario</a>
        </center>
        <br>
    </section>
</div>
@stop
