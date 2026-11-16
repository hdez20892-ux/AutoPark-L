<style>
    .autopark-navbar {
        width: 100%;
        min-height: 84px;
        background-color: #c5e2fa;
        padding: 12px 0;
        border-bottom: 1px solid rgba(0, 0, 0, .06);
        position: relative;
        z-index: 1000;
    }

    .autopark-navbar .container-fluid {
        display: flex;
        align-items: center;
    }

    /* LOGO Y MARCA */

    .autopark-navbar .navbar-brand {
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
        padding: 0 !important;
        margin: 0 !important;
        text-decoration: none;
        flex-shrink: 0;
    }

    .autopark-navbar .navbar-logo {
        width: 58px !important;
        height: 48px !important;
        min-width: 58px !important;
        max-width: 58px !important;
        min-height: 48px !important;
        max-height: 48px !important;
        object-fit: contain !important;
        display: block !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .autopark-navbar .navbar-title {
        font-family: 'Raleway', sans-serif;
        font-size: 25px;
        font-weight: 700;
        color: #111827;
        white-space: nowrap;
    }

    /* ENLACES */

    .autopark-navbar .navbar-collapse {
        flex-grow: 1;
    }

    .autopark-navbar .navbar-nav {
        align-items: center;
    }

    .autopark-navbar .nav-link {
        font-family: 'Roboto Mono', monospace;
        font-size: 14px;
        font-weight: 400;
        color: #172033;
        padding: 10px 13px !important;
        white-space: nowrap;
        transition: color .2s ease;
    }

    .autopark-navbar .nav-link:hover,
    .autopark-navbar .nav-link.active {
        color: #6842a6;
    }

    .autopark-navbar .nav-link.active {
        font-weight: 600;
    }

    /* BOTÓN RESPONSIVO */

    .autopark-navbar .navbar-toggler {
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 8px;
        padding: 7px 10px;
        box-shadow: none !important;
    }

    .autopark-navbar .navbar-toggler:focus {
        box-shadow: 0 0 0 3px rgba(104, 66, 166, .15) !important;
    }

    /* TABLETS Y CELULARES */

    @media (max-width: 991.98px) {
        .autopark-navbar {
            min-height: 75px;
        }

        .autopark-navbar .navbar-collapse {
            padding-top: 15px;
        }

        .autopark-navbar .navbar-nav {
            align-items: stretch;
            gap: 3px;
        }

        .autopark-navbar .nav-link {
            padding: 12px 10px !important;
        }

        .autopark-navbar .nav-link:hover,
        .autopark-navbar .nav-link.active {
            background-color: rgba(255, 255, 255, .4);
            border-radius: 7px;
        }
    }

    @media (max-width: 480px) {
        .autopark-navbar .navbar-logo {
            width: 48px !important;
            height: 42px !important;
            min-width: 48px !important;
            max-width: 48px !important;
            min-height: 42px !important;
            max-height: 42px !important;
        }

        .autopark-navbar .navbar-title {
            font-size: 21px;
        }
    }
</style>

<nav class="navbar navbar-expand-lg autopark-navbar" aria-label="Navegación principal">

    <div class="container-fluid px-3 px-lg-5">

        <!-- LOGO -->

        <a href="{{ route('inicio') }}" class="navbar-brand">

            <img src="{{ asset('assets/images/logo-autopark.png') }}" alt="Logo de AutoPark" class="navbar-logo">

            <span class="navbar-title">AutoPark</span>

        </a>

        <!-- MENÚ RESPONSIVO -->

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
                        <a href="{{ route('estacionamientos.index') }}"
                            class="nav-link {{ request()->routeIs('estacionamientos.*') ? 'active' : '' }}">
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
