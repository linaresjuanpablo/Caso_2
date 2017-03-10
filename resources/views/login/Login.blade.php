@extends('layouts.app')
@section('contenido')
<title>Gestion de Pacientes</title>
<style type="text/css">
    #contenedor {
        text-align: left;
        width: 750px;
        margin: auto;
        margin-top: 20px;
    }
    #imagen {
        width: 400px;  /*Este será el ancho que tendrá tu columna*/
        height: 250px;
        float:right; /*Aqui determinas de lado quieres quede esta "columna" */
    }
    #tabla1 {
        width: 300px;
        height: 50px;
        border: black 2px solid;
        border-collapse: separate;
        padding: 15px;
        margin: 15px;
    }
    td {
        margin: 5px;
        padding: 5px;
    }
    #titulo{
        text-align: center;
        margin-top: 5px;
        font-weight: bold;
        font-size: 40px;
        margin-bottom: 40px;
    }
</style>
<div id="contenedor">
    <p id="titulo">Acceso de personal</p>
    <div><img id="imagen" title="Login" alt="" src="../images/inicio.png"></div>
  <div id="formulario">
    {!! Form::open(['url' => 'foo/bar']) !!}
    <p style="margin-left:20px;">Ingreso de personal autorizado de la clínica</p>
    <table id="tabla1" cellpadding="0">
      <tbody>
        <tr border="2">
          <td><b>Usuario:</b></td>
          <td>{!! Form::text('nombrePaciente') !!}
          </td>
        </tr>
        <tr>
            <td><b>Contraseña:</b></td>
            <td>{!! Form::text('apellidoPaciente') !!}
            </td>
        </tr>
        <tr align="center">
          <td colspan="2" rowspan="1"></td>
        </tr>
        <tr align="center">
          <td colspan="2" rowspan="1">{!! Form::submit('Ingresar') !!}</td>
        </tr>
      </tbody>
    </table>
    {!! Form::close() !!}
    <p><br>
    </p>
  </div>
</div>
@stop
