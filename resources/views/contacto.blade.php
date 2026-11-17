<!DOCTYPE html>
<html lang="es" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contacto - AutoPark</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tipografías -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&family=Roboto+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/publicas.css') }}">
</head>

<body>

    <!-- NAVBAR DE LARAVEL -->
    @include('components.navbar')

    <main>

        <!-- ENCABEZADO -->
        <section class="public-hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        <span class="badge rounded-pill service-badge mb-3">
                            Contacto
                        </span>

                        <h1>¿Necesitas ayuda con AutoPark?</h1>

                        <p class="lead mb-0">
                            Envíanos un mensaje mediante el formulario y cuéntanos
                            cómo podemos ayudarte.
                        </p>

                    </div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN DE CONTACTO -->
        <section class="public-section">
            <div class="container">

                <div class="row g-4">

                    <!-- FORMULARIO -->
                    <div class="col-lg-8">

                        <section class="contact-card">

                            <h2 class="h3 mb-4">Enviar mensaje</h2>

                            <form id="contactForm" class="needs-validation" novalidate>

                                <div class="row g-3">

                                    <!-- NOMBRE -->
                                    <div class="col-md-6">

                                        <label for="nombreContacto" class="form-label">
                                            Nombre completo
                                        </label>

                                        <input type="text" class="form-control" id="nombreContacto" minlength="3"
                                            maxlength="80" required>

                                        <div class="invalid-feedback">
                                            Ingresa tu nombre completo.
                                        </div>

                                    </div>

                                    <!-- CORREO -->
                                    <div class="col-md-6">

                                        <label for="correoContacto" class="form-label">
                                            Correo electrónico
                                        </label>

                                        <input type="email" class="form-control" id="correoContacto"
                                            placeholder="correo@ejemplo.com" maxlength="120" required>

                                        <div class="invalid-feedback">
                                            Ingresa un correo electrónico válido.
                                        </div>

                                    </div>

                                    <!-- ASUNTO -->
                                    <div class="col-12">

                                        <label for="asuntoContacto" class="form-label">
                                            Asunto
                                        </label>

                                        <select class="form-select" id="asuntoContacto" required>

                                            <option value="" selected disabled>
                                                Selecciona una opción
                                            </option>

                                            <option>Ayuda con una reserva</option>
                                            <option>Publicación de espacios</option>
                                            <option>Problema con mi cuenta</option>
                                            <option>Comentario general</option>

                                        </select>

                                        <div class="invalid-feedback">
                                            Selecciona un asunto.
                                        </div>

                                    </div>

                                    <!-- MENSAJE -->
                                    <div class="col-12">

                                        <label for="mensajeContacto" class="form-label">
                                            Mensaje
                                        </label>

                                        <textarea class="form-control" id="mensajeContacto" minlength="10" maxlength="500" required></textarea>

                                        <div class="invalid-feedback">
                                            Escribe un mensaje de al menos 10 caracteres.
                                        </div>

                                    </div>

                                    <!-- PRIVACIDAD -->
                                    <div class="col-12">

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" id="privacidadContacto"
                                                required>

                                            <label class="form-check-label" for="privacidadContacto">
                                                Acepto el aviso de privacidad.
                                            </label>

                                            <div class="invalid-feedback">
                                                Debes aceptar el aviso de privacidad.
                                            </div>

                                        </div>

                                    </div>

                                    <!-- BOTÓN -->
                                    <div class="col-12">

                                        <button type="submit" class="btn autopark-btn-primary">
                                            Enviar mensaje
                                        </button>

                                    </div>

                                </div>

                            </form>

                        </section>

                    </div>

                    <!-- INFORMACIÓN -->
                    <div class="col-lg-4">

                        <aside class="card contact-info-card h-100">

                            <div class="card-body p-4">

                                <h2 class="h4">AutoPark</h2>

                                <p class="public-copy">
                                    Plataforma académica para búsqueda, reserva y
                                    administración de espacios de estacionamiento.
                                </p>

                                <hr>

                                <p class="mb-2">
                                    <strong>Atención:</strong>
                                </p>

                                <p class="public-copy mb-0">
                                    El formulario demuestra validación HTML5 y
                                    componentes Bootstrap. El envío es simulado hasta
                                    conectar el backend.
                                </p>

                            </div>

                        </aside>

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

    <!-- NOTIFICACIÓN -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">

        <div id="contactToast" class="toast" role="status" aria-live="polite" aria-atomic="true">

            <div class="toast-header">

                <strong class="me-auto">AutoPark</strong>

                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>

            </div>

            <div class="toast-body">
                Mensaje validado correctamente. El envío al servidor se conectará en el backend.
            </div>

        </div>

    </div>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/contacto.js') }}"></script>

</body>

</html>
