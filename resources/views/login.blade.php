<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión - AutoPark</title>

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('components/navbar/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body data-navbar-mode="guest">

    @include('components.navbar')

    <main class="login-page">

        <!-- PANEL IZQUIERDO -->
        <section class="login-welcome">
            <div class="welcome-content">

                <h1>
                    Bienvenido<br>
                    de nuevo
                </h1>

                <p class="welcome-text">
                    Continúa administrando tus reservas
                    y espacios desde AutoPark.
                </p>

                <div class="welcome-card">
                    <p>• Consulta disponibilidad</p>
                    <p>• Revisa tus reservas</p>
                    <p>• Gestiona tus espacios</p>
                </div>

            </div>
        </section>

        <!-- PANEL DERECHO -->
        <section class="login-area">

            <div class="login-card">

                <h2>Iniciar sesión</h2>

                <form id="loginForm">

                    <!-- CORREO -->
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>

                        <input class="form-control" type="email" id="email" name="email"
                            placeholder="correo@ejemplo.com" required>
                    </div>

                    <!-- CONTRASEÑA -->
                    <div class="form-group">
                        <label for="password">Contraseña</label>

                        <input class="form-control" type="password" id="password" name="password"
                            placeholder="••••••••" required>
                    </div>

                    <!-- OPCIONES -->
                    <div class="login-options">

                        <label class="remember-option">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">

                            <span>Mantener sesión iniciada</span>
                        </label>

                        <a href="#" class="forgot-password">
                            ¿Olvidaste tu contraseña?
                        </a>

                    </div>

                    <!-- MENSAJE -->
                    <p id="loginMessage" class="login-message"></p>

                    <!-- ENTRAR -->
                    <button type="submit" class="btn btn-login">
                        Entrar
                    </button>

                    <div class="login-divider"></div>

                    <p class="register-text">
                        ¿Aún no tienes cuenta?
                    </p>

                    <!-- REGISTRO LARAVEL -->
                    <a href="{{ route('registro') }}" class="btn-register">
                        Crear cuenta
                    </a>

                </form>

            </div>

        </section>

    </main>

    <!-- SCRIPTS -->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>

</body>

</html>
