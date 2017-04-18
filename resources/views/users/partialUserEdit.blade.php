     <div class="form-group">
         {!! Form::label('nombres', 'Nombres', ['class' => 'control-label']) !!}
         {!! Form::text('nombres', null, ['class' => 'form-control','readonly']) !!}
     </div>
     <div class="form-group">
         {!! Form::label('apellidos', 'Apellidos', ['class' => 'control-label']) !!}
         {!! Form::text('apellidos', null, ['class' => 'form-control','readonly']) !!}
     </div>

     <div class="form-group">
     {!! Form::label('lblTipoUser', 'Tipo usuario', ['class' => 'control-label']) !!}
         {!! Form::text('tipo_usuario', null, ['class' => 'form-control','readonly']) !!}
    </div>

     <div class="form-group">
         {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
         {!! Form::text('email', null, ['class' => 'form-control','readonly']) !!}
     </div>
      <div class="form-group">
       {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
     </div>

    {!! Form::submit('Cambiar contraseña', ['class' => 'btn btn-primary']) !!}
