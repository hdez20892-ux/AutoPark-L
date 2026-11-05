<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro - AutoPark</title>

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('components/navbar/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">

</head>

<body data-navbar-mode="guest">

    <!-- NAVBAR -->
    @include('components.navbar')


    <!-- CONTENIDO -->
    <main class="registro-page">

        <section class="registro-header">

            <h1>Crea tu cuenta</h1>

            <p>
                Regístrate para reservar estacionamientos
                o publicar tus propios espacios.
            </p>

        </section>


        <div class="registro-layout">


            <!-- FORMULARIO -->
            <section class="registro-card">

                <h2>Datos de registro</h2>


                <form id="registroForm" action="{{ route('registro.store') }}" method="POST">

                    @csrf

                    <div class="form-grid">


                        <div class="form-group">

                            <label for="nombre">
                                Nombre completo
                            </label>

                            <input class="form-control" type="text" id="nombre" name="nombre"
                                value="{{ old('nombre') }}" placeholder="Ej. Fernando Ruiz" required>

                            @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="correo">
                                Correo electrónico
                            </label>

                            <input class="form-control" type="email" id="correo" name="correo"
                                value="{{ old('correo') }}" placeholder="correo@ejemplo.com" required>

                            @error('correo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="password">
                                Contraseña
                            </label>

                            <input class="form-control" type="password" id="password" name="password"
                                placeholder="Mínimo 8 caracteres" minlength="8" required>

                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="confirmPassword">
                                Confirmar contraseña
                            </label>

                            <input class="form-control" type="password" id="confirmPassword"
                                name="password_confirmation" placeholder="Repite tu contraseña" minlength="8" required>

                        </div>

                    </div>


                    <!-- TIPO DE CUENTA -->
                    <div class="account-section">

                        <span class="account-label">
                            Tipo de cuenta
                        </span>


                        <div class="account-options">

                            <label class="account-option selected">

                                <input class="form-check-input" type="radio" name="tipoCuenta" value="conductor"
                                    checked>

                                Conductor

                            </label>


                            <label class="account-option">

                                <input class="form-check-input" type="radio" name="tipoCuenta" value="propietario">

                                Propietario

                            </label>

                        </div>

                        @error('tipoCuenta')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- TÉRMINOS -->
                    <label class="terms">

                        <input class="form-check-input" type="checkbox" name="terminos" value="1" required>

                        <span>
                            Acepto los términos y el aviso de privacidad
                        </span>

                    </label>

                    @error('terminos')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror


                    <!-- MENSAJES -->
                    @if (session('success'))
                        <p class="registro-mensaje text-success">
                            {{ session('success') }}
                        </p>
                    @endif


                    @if (session('error'))
                        <p class="registro-mensaje text-danger">
                            {{ session('error') }}
                        </p>
                    @endif


                    <p id="registroMensaje" class="registro-mensaje"></p>


                    <!-- BOTÓN -->
                    <button type="submit" class="btn btn-crear-cuenta">
                        Crear cuenta
                    </button>


                    <p class="login-link">

                        ¿Ya tienes una cuenta?

                        <a href="{{ url('/login') }}">
                            Inicia sesión
                        </a>

                    </p>

                </form>

            </section>


            <!-- PANEL DERECHO -->
            <aside class="registro-info">

                <img src="{{ asset('assets/images/logo-autopark.png') }}" alt="AutoPark" class="registro-info-logo">

                <h2>
                    Tu espacio, tu tiempo
                </h2>

                <p>
                    Gestiona reservas, disponibilidad
                    y espacios desde una interfaz clara
                    y sencilla.
                </p>

            </aside>


        </div>

    </main>


    <!-- SCRIPTS -->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/registro.js') }}"></script>

</body>

</html>
