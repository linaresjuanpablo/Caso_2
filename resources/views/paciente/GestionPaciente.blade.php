@extends('layouts.app')
@section('contenido')
<title>Gestion de Pacientes</title>
<style type="text/css">
  #contenedor{
    text-align: left;
    width: 750px;
    margin: auto;}
  #lateral{
    width: 200px;  /*Este será el ancho que tendrá tu columna*/
    background-color: #FFFFFF;  /*Aquí pon el color del fondo que quieras para este lateral*/
    float:left; /*Aqui determinas de lado quieres quede esta "columna" */
    }
  #principal{
    margin-left:320px; /*Este margen hace que no se encime el contenido en tu menúlateral, es     importante que pongas un pocos pixeles más que el ancho  de tu columna lateral*/
    background-color: #FFFFFF;
    /*border:#000000 1px solid;*/ /*ponemos un dorde para que se vea bonito*/
    }
</style>
<p><br>
</p>
<div id="contenedor">
  <div id="lateral"> <img title="Paciente" alt="" src="../images/paciente.jpg"></div>
  <div id="principal">
    {!! Form::open(['url' => 'foo/bar']) !!}
    <table style="width: 430px; height: 342px;" border="2" cellpadding="0">
      <tbody>
        <tr align="center">
          <td colspan="2" rowspan="1">INFORMACIÓN NUEVO PACIENTE</td>
        </tr>
        <tr>
          <td style="width: 203.117px;">Número de Documento:</td>
          <td>{!! Form::text('numDocumento') !!}
          </td>
        </tr>
        <tr>
          <td>Nombres:</td>
          <td>{!! Form::text('nombrePaciente') !!}
          </td>
        </tr>
        <tr>
          <td>Apellidos:</td>
          <td>{!! Form::text('apellidoPaciente') !!}
          </td>
        </tr>
        <tr>
          <td>Sexo:</td>
          <td>
              {!! Form::radio('sexo', 'male', true, ['id' => 'radio1']) !!}
              {!! Form::label('radio1', 'Masculino') !!}
              <br>
              {!! Form::radio('sexo', 'female', false, ['id' => 'radio2']) !!}
              {!! Form::label('radio2', 'Femenino.') !!}
          </td>
        </tr>
        <tr>
          <td>Fecha de Nacimiento:</td>
          <td>{!! Form::text('fechaNacimiento') !!}
          </td>
        </tr>
        <tr>
          <td>EPS:</td>
          <td>{!! Form::text('epsPaciente') !!}
          </td>
        </tr>
        <tr>
          <td>Teléfono:</td>
          <td>{!! Form::text('telefonoPaciente') !!}
          </td>
        </tr>
        <tr>
          <td>Dirección:</td>
          <td>{!! Form::text('direccionPaciente') !!}
          </td>
        </tr>
        <tr>
          <td>Acudiente:</td>
          <td>{!! Form::text('nombresAcudiente') !!}
          </td>
        </tr>
        <tr>
          <td>Teléfono Acudiente:</td>
          <td>{!! Form::text('telefonoAcudiente') !!}
          </td>
        </tr>
        <tr align="center">
          <td colspan="2" rowspan="1">{!! Form::submit('Grabar') !!}</td>
        </tr>
      </tbody>
    </table>
    {!! Form::close() !!}
    <p><br>
    </p>
  </div>
</div>
@stop
