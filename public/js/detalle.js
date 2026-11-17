
"use strict";

document.addEventListener("DOMContentLoaded", () => {
    // Estacionamiento seleccionado desde la página de búsqueda.
    function obtenerEstacionamiento() {
        try {
            const guardado = sessionStorage.getItem("estacionamientoSeleccionado");
            if (guardado) {
                const datos = JSON.parse(guardado);
                if (datos && datos.id) return datos;
            }
        } catch (error) {
            console.error("Error al recuperar el estacionamiento:", error);
        }

        return {
            id: 1,
            nombre: "Estacionamiento Plaza Juárez",
            ubicacion: "Centro de Pachuca, Hidalgo",
            zona: "Centro",
            precio: 22,
            disponibles: 4,
            capacidad: 10
        };
    }

    const estacionamiento = obtenerEstacionamiento();
    const precio = Number(estacionamiento.precio) || 22;
    const disponibles = Number(estacionamiento.disponibles) || 4;
    const capacidad = Number(estacionamiento.capacidad) || 10;
    const zona = estacionamiento.zona || "Centro";

    const detallesExtra = {
        1: {
            horario: "06:00 a 22:00",
            servicios: ["seguridad", "iluminacion", "acceso", "ubicacion"]
        },
        2: {
            horario: "08:00 a 21:00",
            servicios: ["seguridad", "iluminacion", "acceso"]
        },
        3: {
            horario: "07:00 a 22:00",
            servicios: ["seguridad", "iluminacion", "ubicacion"]
        }
    };

    const extra = detallesExtra[estacionamiento.id] || detallesExtra[1];

    const $ = (id) => document.getElementById(id);

    const nombre = $("nombreEstacionamiento");
    const zonaElemento = $("zonaEstacionamiento");
    const ubicacion = $("ubicacionEstacionamiento");
    const precioHora = $("precioHora");
    const espacios = $("espaciosDisponibles");
    const capacidadTotal = $("capacidadTotal");
    const detalleNombre = $("detalleNombre");
    const detalleUbicacion = $("detalleUbicacion");
    const detalleZona = $("detalleZona");
    const listaServicios = $("listaServicios");
    const descripcionServicio = $("descripcionServicio");

    const fecha = $("fechaReserva");
    const horaEntrada = $("horaEntrada");
    const horaSalida = $("horaSalida");
    const duracionReserva = $("duracionReserva");
    const precioCalculado = $("precioCalculado");
    const totalReserva = $("totalReserva");
    const mensajeValidacion = $("mensajeValidacion");
    const formulario = $("formReserva");

    const modalElemento = $("modalReserva");
    const modalReserva = bootstrap.Modal.getOrCreateInstance(modalElemento);
    const toastElemento = $("toastAutoPark");
    const toast = bootstrap.Toast.getOrCreateInstance(toastElemento, { delay: 3000 });

    function mostrarToast(mensaje) {
        $("mensajeToast").textContent = mensaje;
        toast.show();
    }

    function formatoPrecio(cantidad) {
        return `$${cantidad.toFixed(2)}`;
    }

    // Mostrar la información del estacionamiento.
    function mostrarInformacion() {
        const nombreEstacionamiento = estacionamiento.nombre || "Estacionamiento Plaza Juárez";
        const direccion = estacionamiento.ubicacion || "Centro de Pachuca, Hidalgo";

        nombre.textContent = nombreEstacionamiento;
        zonaElemento.textContent = zona;
        ubicacion.textContent = direccion;

        precioHora.textContent = formatoPrecio(precio);
        $("precioResumen").textContent = formatoPrecio(precio);
        espacios.textContent = `${disponibles} espacios`;
        capacidadTotal.textContent = `${capacidad} espacios`;

        detalleNombre.textContent = nombreEstacionamiento;
        detalleUbicacion.textContent = direccion;
        detalleZona.textContent = zona;

        $("resumenDisponibilidad").textContent = `${disponibles} espacios`;
        $("resumenZona").textContent = zona;
        $("precioCalculado").textContent = `${formatoPrecio(precio)} MXN`;
    }

    // Servicios interactivos.
    const servicios = {
        seguridad: {
            nombre: "Seguridad",
            descripcion: "El estacionamiento cuenta con medidas de vigilancia para brindar mayor tranquilidad durante tu estancia."
        },
        iluminacion: {
            nombre: "Iluminación",
            descripcion: "El área cuenta con iluminación para facilitar el acceso y la visibilidad."
        },
        acceso: {
            nombre: "Acceso vehicular",
            descripcion: "Dispone de acceso para vehículos de acuerdo con las características del estacionamiento."
        },
        ubicacion: {
            nombre: "Ubicación céntrica",
            descripcion: "Se encuentra en una zona de fácil acceso y cercana a puntos de interés."
        }
    };

    function mostrarServicios() {
        listaServicios.replaceChildren();

        extra.servicios.forEach((clave) => {
            const servicio = servicios[clave];
            if (!servicio) return;

            const boton = document.createElement("button");
            boton.type = "button";
            boton.className = "service-button";
            boton.dataset.servicio = clave;
            boton.textContent = servicio.nombre;
            listaServicios.appendChild(boton);
        });
    }

    listaServicios.addEventListener("click", (evento) => {
        const boton = evento.target.closest("[data-servicio]");
        if (!boton) return;

        listaServicios.querySelectorAll(".service-button").forEach((elemento) => {
            elemento.classList.remove("active");
        });

        boton.classList.add("active");

        const servicio = servicios[boton.dataset.servicio];
        descripcionServicio.textContent = servicio.descripcion;
    });

    // Favoritos.
    const btnFavorito = $("btnFavorito");

    function obtenerFavoritos() {
        try {
            const datos = JSON.parse(localStorage.getItem("autoparkFavoritos") || "[]");
            return Array.isArray(datos) ? datos : [];
        } catch {
            return [];
        }
    }

    function actualizarFavorito() {
        const favoritos = obtenerFavoritos();
        const esFavorito = favoritos.some((item) => String(item.id) === String(estacionamiento.id));

        btnFavorito.setAttribute("aria-pressed", String(esFavorito));
        btnFavorito.textContent = esFavorito ? "♥ Quitar de favoritos" : "♡ Agregar a favoritos";
    }

    btnFavorito.addEventListener("click", () => {
        const favoritos = obtenerFavoritos();
        const indice = favoritos.findIndex((item) => String(item.id) === String(estacionamiento.id));

        if (indice >= 0) {
            favoritos.splice(indice, 1);
            mostrarToast("Se quitó de tus favoritos.");
        } else {
            favoritos.push({
                id: estacionamiento.id,
                nombre: estacionamiento.nombre,
                ubicacion: estacionamiento.ubicacion
            });
            mostrarToast("Se agregó a tus favoritos.");
        }

        localStorage.setItem("autoparkFavoritos", JSON.stringify(favoritos));
        actualizarFavorito();
    });

    // Copiar ubicación.
    $("btnCopiarUbicacion").addEventListener("click", async () => {
        const texto = estacionamiento.ubicacion || "Centro de Pachuca, Hidalgo";

        try {
            await navigator.clipboard.writeText(texto);
            mostrarToast("Ubicación copiada correctamente.");
        } catch {
            const temporal = document.createElement("textarea");
            temporal.value = texto;
            document.body.appendChild(temporal);
            temporal.select();
            document.execCommand("copy");
            temporal.remove();
            mostrarToast("Ubicación copiada.");
        }
    });

    // Tema claro y oscuro.
    const btnTema = $("btnTema");

    function aplicarTema(tema) {
        document.documentElement.setAttribute("data-bs-theme", tema);
        btnTema.textContent = tema === "dark" ? "☀️ Tema claro" : "🌙 Tema oscuro";
        localStorage.setItem("autoparkTema", tema);
    }

    aplicarTema(localStorage.getItem("autoparkTema") || "light");

    btnTema.addEventListener("click", () => {
        const temaActual = document.documentElement.getAttribute("data-bs-theme");
        aplicarTema(temaActual === "dark" ? "light" : "dark");
    });

    // Fecha mínima: hoy.
    function establecerFecha() {
        const hoy = new Date();
        const anio = hoy.getFullYear();
        const mes = String(hoy.getMonth() + 1).padStart(2, "0");
        const dia = String(hoy.getDate()).padStart(2, "0");
        const fechaActual = `${anio}-${mes}-${dia}`;

        fecha.min = fechaActual;
        if (!fecha.value || fecha.value < fechaActual) {
            fecha.value = fechaActual;
        }
    }

    function minutos(hora) {
        const [horas, mins] = hora.split(":").map(Number);
        return horas * 60 + mins;
    }

    // Calcular costo.
    function calcularTotal() {
        mensajeValidacion.textContent = "";

        if (!horaEntrada.value || !horaSalida.value) {
            duracionReserva.textContent = "0 horas";
            totalReserva.textContent = "$0.00";
            return 0;
        }

        const entrada = minutos(horaEntrada.value);
        const salida = minutos(horaSalida.value);

        if (salida <= entrada) {
            duracionReserva.textContent = "Horario inválido";
            totalReserva.textContent = "$0.00";
            mensajeValidacion.textContent = "La hora de salida debe ser posterior a la entrada.";
            return 0;
        }

        const horas = Math.ceil((salida - entrada) / 60);
        const total = horas * precio;

        duracionReserva.textContent = `${horas} ${horas === 1 ? "hora" : "horas"}`;
        totalReserva.textContent = `${formatoPrecio(total)} MXN`;

        return total;
    }

    horaEntrada.addEventListener("input", calcularTotal);
    horaSalida.addEventListener("input", calcularTotal);
    horaEntrada.addEventListener("change", calcularTotal);
    horaSalida.addEventListener("change", calcularTotal);

    // Abrir modal de reserva.
    $("btnAbrirReserva").addEventListener("click", () => {
        establecerFecha();
        calcularTotal();
        modalReserva.show();
    });

    // Guardar y confirmar reserva.
    formulario.addEventListener("submit", (evento) => {
        evento.preventDefault();
        formulario.classList.add("was-validated");
        mensajeValidacion.textContent = "";

        if (!fecha.value || fecha.value < fecha.min) {
            mensajeValidacion.textContent = "Selecciona una fecha válida.";
            fecha.classList.add("is-invalid");
            return;
        }

        if (!horaEntrada.value || !horaSalida.value || minutos(horaSalida.value) <= minutos(horaEntrada.value)) {
            mensajeValidacion.textContent = "Revisa el horario. La salida debe ser posterior a la entrada.";
            horaSalida.classList.add("is-invalid");
            return;
        }

        fecha.classList.remove("is-invalid");
        horaEntrada.classList.remove("is-invalid");
        horaSalida.classList.remove("is-invalid");

        const total = calcularTotal();
        if (total <= 0) return;

        if (localStorage.getItem("sesionActiva") !== "true") {
            sessionStorage.setItem("redirectAfterLogin", "/detalle-estacionamiento");
            mostrarToast("Necesitas iniciar sesión para reservar.");

            setTimeout(() => {
                window.location.href = "/login";
            }, 900);

            return;
        }

        const reserva = {
            id: Date.now(),
            nombre: estacionamiento.nombre || "Estacionamiento Plaza Juárez",
            estacionamientoId: estacionamiento.id,
            ubicacion: estacionamiento.ubicacion || "Centro de Pachuca, Hidalgo",
            zona: zona,
            fecha: fecha.value,
            entrada: horaEntrada.value,
            salida: horaSalida.value,
            horaEntrada: horaEntrada.value,
            horaSalida: horaSalida.value,
            precioHora: precio,
            total: Number(total.toFixed(2)),
            estado: "Confirmada"
        };

        try {
            const reservas = JSON.parse(localStorage.getItem("autoparkReservas") || "[]");
            const lista = Array.isArray(reservas) ? reservas : [];

            lista.unshift(reserva);
            localStorage.setItem("autoparkReservas", JSON.stringify(lista));

            modalReserva.hide();
            formulario.reset();
            formulario.classList.remove("was-validated");
            establecerFecha();
            calcularTotal();

            mostrarToast("¡Tu reserva se guardó correctamente!");

            setTimeout(() => {
                window.location.href = "/reservas";
            }, 1000);
        } catch (error) {
            console.error("Error al guardar la reserva:", error);
            mensajeValidacion.textContent = "No fue posible guardar la reserva.";
        }
    });

    // Inicialización.
    mostrarInformacion();
    mostrarServicios();
    actualizarFavorito();
    establecerFecha();
    calcularTotal();
});