<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Centro médico</title>
    <!-- Styles -->
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
  <header>
      <div class="container">
     <section class="row " >
      <section class="col-md-3">
        <img src={{ asset('images/clinicahead.png') }}  class="img-responsive" alt="Responsive image">
      </section>
        <section class="col-md-9" style="margin-top:40px;font-size:40px;text-align:left">
          <h1>CLINICA DE ESPECIALISTAS MATASANOS</h1>
         </section>
    </section>
      </div>
  </header>
   <section class="row">
       <section class="col-md-12">
           <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                                    </div>
                   <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                       @if (Auth::check())
                          <li><a href="{{ route('userHome') }}">Inicio</a></li>
                        @if(Auth::user()->tipo_usuario=='MEDICO')
                             <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Opciones<span class="caret"></span> </a>
                           <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('appoDoctor',Auth::user()->id) }}">Ver listado de citas</a></li>
                             <li><a href="{{ route('docEditPass') }}">Cambiar contraseña</a></li>

                           </ul>


                          </li>





                        @else
                          @include('layouts/partialLayout2')
                        @endif
                    </ul>
                          <!-- Right Side Of Navbar -->
                       <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->nombres .' ' .Auth::user()->apellidos  }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                            <li>
                              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                             </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
       </section>
   </section>
    <section>
            <div class="container-fluid">
            <!-- Espacio para los mensajes flash enviados entre solicitudes -->

             @yield('contenido')
            </div>
            </section>
    <footer class="clase-general">
        <div class="container">
           <section style="margin-top:10px;font-size:10px;text-align:center">
           Taller:Desarrollo web con laravel. Caso de estudio 2 <br>
           Módulo: Procesos Agiles de Desarrollo de Software <br>
           Maestria en Gestión y Desarrollo de Proyectos de Software <br>
           Universidad Autónoma Manizales
           </section>
            </div>
    </footer>

    <script src="js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="js/jquery.js"></script>
</body>
</html>
