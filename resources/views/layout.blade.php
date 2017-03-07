<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css" >
</head>
<body>
  <header>

      <div class="container">
     <section class="row " >
      <section class="col-md-3">

        <img src="images/clinicahead.png"  class="img-responsive" alt="Responsive image">
      </section>

        <section class="col-md-9" style="margin-top:40px;font-size:30px;text-align:left" >
          CLINICA DE ESPECIALISTAS MATASANOS
        <section>


    </section>

      </div>

  </header>

    <section>
            <div class="container">
             @yield('contenido')

            </div>
            </section>
    <footer>
        <div class="container">
           <section style="margin-top:10px;font-size:10px;text-align:center">

           Taller:Desarrollo web con laravel. Caso de estudio 2 <br>
           Módulo: Procesos Agiles de Desarrollo de Software <br>
           Maestria en Gestión y Desarrollo de Proyectos de Sofware <br>
           Universidad Autónoma manizales

           </section>
            </div>


    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
