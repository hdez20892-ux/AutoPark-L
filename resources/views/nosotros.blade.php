<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - AutoPark</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}">

    <!-- Tipografías -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('components/navbar/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/publicas.css') }}">
</head>

<body>

    <!-- NAVBAR -->
    @include('components.navbar')

    <main>

        <!-- HERO -->
        <section class="public-hero">
            <div class="container">
                <div class="row align-items-center g-5">

                    <div class="col-lg-7">
                        <span class="badge rounded-pill team-badge mb-3">
                            Conoce AutoPark
                        </span>

                        <h1>Estacionarse debería ser más sencillo</h1>

                        <p class="lead mb-4">
                            AutoPark conecta a conductores que buscan un lugar disponible
                            con propietarios que desean administrar y publicar sus espacios
                            de estacionamiento desde una misma plataforma.
                        </p>

                        <a href="{{ route('servicios') }}" class="btn autopark-btn-primary me-2">
                            Ver servicios
                        </a>

                        <a href="{{ route('contacto') }}" class="btn autopark-btn-outline">
                            Contacto
                        </a>
                    </div>

                    <div class="col-lg-5 text-center">
                        <img src="{{ asset('assets/images/logo-autopark.png') }}" alt="Logotipo de AutoPark"
                            class="img-fluid" style="max-width: 280px;">
                    </div>

                </div>
            </div>
        </section>

        <!-- PROPÓSITO -->
        <section class="public-section">
            <div class="container">

                <h2 class="section-title">Nuestro propósito</h2>

                <div class="row g-4">

                    <div class="col-md-4">
                        <article class="card autopark-card">
                            <div class="card-body">
                                <span class="autopark-icon">1</span>

                                <h3 class="h4">Encontrar</h3>

                                <p class="card-text">
                                    Facilitar la búsqueda de estacionamientos por zona,
                                    precio y disponibilidad.
                                </p>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="card autopark-card">
                            <div class="card-body">
                                <span class="autopark-icon">2</span>

                                <h3 class="h4">Reservar</h3>

                                <p class="card-text">
                                    Mostrar información clara para reservar con mayor
                                    seguridad y menos tiempo perdido.
                                </p>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-4">
                        <article class="card autopark-card">
                            <div class="card-body">
                                <span class="autopark-icon">3</span>

                                <h3 class="h4">Administrar</h3>

                                <p class="card-text">
                                    Dar a propietarios herramientas para publicar y
                                    gestionar disponibilidad y horarios.
                                </p>
                            </div>
                        </article>
                    </div>

                </div>
            </div>
        </section>

        <!-- PROYECTO ACADÉMICO -->
        <section class="pb-5">
            <div class="container">

                <div class="card autopark-card">
                    <div class="card-body">

                        <div class="row align-items-center g-4">

                            <div class="col-lg-8">
                                <h2 class="h3 mb-3">Proyecto académico</h2>

                                <p class="public-copy mb-0">
                                    AutoPark se desarrolla como un sitio web multipágina
                                    responsive, utilizando HTML5, CSS, JavaScript,
                                    Bootstrap 5 y control de versiones con Git y GitHub.
                                </p>
                            </div>

                            <div class="col-lg-4 text-lg-end">
                                <span class="badge service-badge rounded-pill px-3 py-2">
                                    Aplicaciones Web
                                </span>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="public-footer">
        <div class="container">
            AutoPark · estacionamiento simple, claro y accesible
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
