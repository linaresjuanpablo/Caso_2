          @if(Auth::user()->tipo_usuario=='ADMINISTRADOR')
                           <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administrar usuarios<span class="caret"></span> </a>
                           <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('userAdmin') }}">Listado de usuarios</a></li>
                            <li><a href="{{ route('users.create') }}">Agregar usuario</a></li>
                           </ul>
                           </li>
                         @endif

                           <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pacientes<span class="caret"></span> </a>
                           <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('patientAdmin') }}">Listado de pacientes</a></li>
                            <li><a href="{{ route('patients.create') }}">Agregar pacientes</a></li>
                           </ul>

                          </li>

                          <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Médicos<span class="caret"></span> </a>
                           <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('doctorAdmin') }}">Listado de médicos</a></li>
                            <li><a href="{{ route('doctors.create') }}">Agregar médico</a></li>
                           </ul>

                          </li>

                          <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Citas<span class="caret"></span> </a>
                           <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('appointmentAdmin') }}">Listado de citas</a></li>
                            <li><a href="{{ route('appointments.create') }}">Agregar nueva cita</a></li>
                           </ul>

                          </li>

                          <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reportes<span class="caret"></span> </a>
                           <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('report1') }}">Reporte medicos cita </a></li>

                           </ul>

                          </li>










