<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - AutoPark</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}">

    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('components/navbar/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/publicas.css') }}">
</head>

<body>

    <!-- NAVBAR -->
    @include('components.navbar')

    <main>

        <!-- PRESENTACIÓN -->
        <section class="public-hero">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">

                        <span class="badge rounded-pill service-badge mb-3">
                            Servicios
                        </span>

                        <h1>Todo lo necesario para gestionar estacionamientos</h1>

                        <p class="lead mb-0">
                            Busca espacios disponibles, consulta detalles, reserva y
                            administra estacionamientos desde AutoPark.
                        </p>

                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICIOS -->
        <section class="public-section">
            <div class="container">
                <div class="row g-4">

                    <!-- BUSCAR -->
                    <div class="col-sm-6 col-lg-3">
                        <article class="card autopark-card">
                            <div class="card-body">

                                <span class="autopark-icon">
                                    <img src="{{ asset('assets/icons/search.svg') }}" alt=""
                                        class="autopark-icon-img" aria-hidden="true">
                                </span>

                                <h2 class="h5">Buscar</h2>

                                <p class="card-text">
                                    Consulta opciones por ubicación, disponibilidad,
                                    precio y características.
                                </p>

                                <a href="{{ route('busqueda') }}" class="btn autopark-btn-outline">
                                    Ir a buscar
                                </a>

                            </div>
                        </article>
                    </div>

                    <!-- RESERVAR -->
                    <div class="col-sm-6 col-lg-3">
                        <article class="card autopark-card">
                            <div class="card-body">

                                <span class="autopark-icon">
                                    <img src="{{ asset('assets/icons/calendar-check.svg') }}" alt=""
                                        class="autopark-icon-img" aria-hidden="true">
                                </span>

                                <h2 class="h5">Reservar</h2>

                                <p class="card-text">
                                    Selecciona fecha y horario, consulta el total estimado
                                    y registra tu reserva.
                                </p>

                            </div>
                        </article>
                    </div>

                    <!-- PUBLICAR -->
                    <div class="col-sm-6 col-lg-3">
                        <article class="card autopark-card">
                            <div class="card-body">

                                <span class="autopark-icon">
                                    <img src="{{ asset('assets/icons/plus-circle.svg') }}" alt=""
                                        class="autopark-icon-img" aria-hidden="true">
                                </span>

                                <h2 class="h5">Publicar</h2>

                                <p class="card-text">
                                    Registra espacios, precios, horarios y capacidad
                                    disponible.
                                </p>

                            </div>
                        </article>
                    </div>

                    <!-- ADMINISTRAR -->
                    <div class="col-sm-6 col-lg-3">
                        <article class="card autopark-card">
                            <div class="card-body">

                                <span class="autopark-icon">
                                    <img src="{{ asset('assets/icons/sliders.svg') }}" alt=""
                                        class="autopark-icon-img" aria-hidden="true">
                                </span>

                                <h2 class="h5">Administrar</h2>

                                <p class="card-text">
                                    Edita espacios y controla su disponibilidad desde
                                    tu cuenta.
                                </p>

                            </div>
                        </article>
                    </div>

                </div>
            </div>
        </section>

        <!-- PREGUNTAS FRECUENTES -->
        <section class="pb-5">
            <div class="container">

                <h2 class="section-title">Preguntas frecuentes</h2>

                <div class="accordion" id="servicesAccordion">

                    <!-- PREGUNTA 1 -->
                    <div class="accordion-item">
                        <h3 class="accordion-header">

                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">
                                ¿Puedo buscar sin iniciar sesión?
                            </button>

                        </h3>

                        <div id="faqOne" class="accordion-collapse collapse show"
                            data-bs-parent="#servicesAccordion">
                            <div class="accordion-body">
                                Sí. La búsqueda y el detalle de los estacionamientos son
                                públicos. Para reservar necesitas iniciar sesión.
                            </div>
                        </div>
                    </div>

                    <!-- PREGUNTA 2 -->
                    <div class="accordion-item">
                        <h3 class="accordion-header">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">
                                ¿Cómo publico un espacio?
                            </button>

                        </h3>

                        <div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                            <div class="accordion-body">
                                Inicia sesión y entra a Mis espacios. Desde ahí puedes
                                publicar y posteriormente modificar horario, capacidad
                                y disponibilidad.
                            </div>
                        </div>
                    </div>

                    <!-- PREGUNTA 3 -->
                    <div class="accordion-item">
                        <h3 class="accordion-header">

                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">
                                ¿Puedo cancelar una reserva?
                            </button>

                        </h3>

                        <div id="faqThree" class="accordion-collapse collapse" data-bs-parent="#servicesAccordion">
                            <div class="accordion-body">
                                Sí. En Mis reservas puedes cancelar una reserva activa y
                                después consultarla desde el historial.
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

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
