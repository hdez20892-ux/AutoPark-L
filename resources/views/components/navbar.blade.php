<nav class="navbar navbar-expand-lg autopark-navbar" aria-label="Navegación principal">

    <div class="container-fluid px-3 px-lg-5">

        <a href="{{ route('inicio') }}" class="navbar-brand d-flex align-items-center gap-2">

            <img src="{{ asset('assets/images/logo-autopark.png') }}" alt="Logo de AutoPark" class="navbar-logo">

            <span class="navbar-title">AutoPark</span>

        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLinks"
            aria-controls="navbarLinks" aria-expanded="false" aria-label="Abrir navegación">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse" id="navbarLinks">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                <li class="nav-item">
                    <a href="{{ route('inicio') }}" class="nav-link {{ request()->routeIs('inicio') ? 'active' : '' }}">
                        Inicio
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/busqueda') }}" class="nav-link">
                        Buscar
                    </a>
                </li>


                @if (session()->has('autopark_usuario'))
                    <li class="nav-item">
                        <a href="{{ url('/reservas') }}" class="nav-link">
                            Mis reservas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/espacios') }}" class="nav-link">
                            Mis espacios
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/perfil') }}" class="nav-link">
                            Perfil
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ url('/nosotros') }}" class="nav-link">
                            Nosotros
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/servicios') }}" class="nav-link">
                            Servicios
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/contacto') }}" class="nav-link">
                            Contacto
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/login') }}" class="nav-link">
                            Iniciar sesión
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('registro') }}" class="nav-link">
                            Registrarse
                        </a>
                    </li>
                @endif

            </ul>

        </div>

    </div>

</nav>
