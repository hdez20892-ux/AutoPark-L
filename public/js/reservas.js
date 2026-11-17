
"use strict";

/* =========================
   ELEMENTOS DEL DOM
========================= */

const reservasContainer = document.getElementById("reservasContainer");
const emptyState = document.getElementById("emptyState");
const tabButtons = document.querySelectorAll(".tab-button");

let tabActual = "activas";


/* =========================
   DATOS DE EJEMPLO
========================= */

const reservasEjemplo = [
    {
        id: 1,
        estacionamiento: {
            id: 1,
            nombre: "Estacionamiento Centro",
            ubicacion: "Centro de Pachuca",
            precio: 20,
            disponibles: 5
        },
        fecha: "2026-10-01",
        horaEntrada: "18:00",
        horaSalida: "20:00",
        total: 40,
        estado: "activa"
    },
    {
        id: 2,
        estacionamiento: {
            id: 2,
            nombre: "Plaza Juárez",
            ubicacion: "Zona Centro",
            precio: 22,
            disponibles: 4
        },
        fecha: "2026-10-04",
        horaEntrada: "10:00",
        horaSalida: "12:00",
        total: 44,
        estado: "activa"
    }
];


/* =========================
   CARGAR RESERVAS
========================= */

function cargarReservas() {
    const guardadas = localStorage.getItem("autoparkReservas");

    if (!guardadas) {
        localStorage.setItem(
            "autoparkReservas",
            JSON.stringify(reservasEjemplo)
        );

        return [...reservasEjemplo];
    }

    try {
        const datos = JSON.parse(guardadas);

        return Array.isArray(datos) ? datos : [];
    } catch (error) {
        console.error("Error al cargar las reservas:", error);
        return [];
    }
}

let reservas = cargarReservas();


/* =========================
   GUARDAR RESERVAS
========================= */

function guardarReservas() {
    localStorage.setItem(
        "autoparkReservas",
        JSON.stringify(reservas)
    );
}


/* =========================
   FORMATEAR FECHA
========================= */

function formatearFecha(fecha) {
    if (!fecha) return "Fecha no disponible";

    const fechaObjeto = new Date(`${fecha}T00:00:00`);

    if (Number.isNaN(fechaObjeto.getTime())) {
        return "Fecha no disponible";
    }

    return fechaObjeto
        .toLocaleDateString("es-MX", {
            day: "2-digit",
            month: "short",
            year: "numeric"
        })
        .replace(".", "");
}


/* =========================
   MOSTRAR RESERVAS
========================= */

function mostrarReservas() {
    reservasContainer.innerHTML = "";

    const filtradas = reservas.filter(reserva => {
        if (tabActual === "activas") {
            return reserva.estado === "activa";
        }

        return reserva.estado !== "activa";
    });

    if (filtradas.length === 0) {
        emptyState.classList.remove("hidden");
        return;
    }

    emptyState.classList.add("hidden");

    filtradas.forEach(reserva => {
        const card = document.createElement("article");

        card.className = "reserva-card card";

        const estadoTexto =
            reserva.estado === "activa"
                ? "Confirmada"
                : reserva.estado === "cancelada"
                    ? "Cancelada"
                    : "Finalizada";

        const estacionamiento = reserva.estacionamiento || {};

        const imagen = document.createElement("div");
        imagen.className = "reserva-image";
        imagen.textContent = "P";

        const info = document.createElement("div");
        info.className = "reserva-info";

        const nombre = document.createElement("h2");
        nombre.textContent =
            estacionamiento.nombre || "Estacionamiento";

        const horario = document.createElement("p");
        horario.textContent =
            `${formatearFecha(reserva.fecha)} · ${reserva.horaEntrada || "--:--"} – ${reserva.horaSalida || "--:--"}`;

        const ubicacion = document.createElement("p");
        ubicacion.textContent =
            estacionamiento.ubicacion || "Ubicación no disponible";

        const total = document.createElement("p");
        total.textContent =
            `Total: $${Number(reserva.total) || 0} MXN`;

        info.append(nombre, horario, ubicacion, total);

        const acciones = document.createElement("div");
        acciones.className = "reserva-actions";

        const estado = document.createElement("span");
        estado.className =
            `status-badge badge rounded-pill ${reserva.estado}`;

        estado.textContent = estadoTexto;

        const btnDetalle = document.createElement("button");
        btnDetalle.type = "button";
        btnDetalle.className = "btn btn-detail";
        btnDetalle.dataset.action = "detalle";
        btnDetalle.dataset.id = reserva.id;
        btnDetalle.textContent = "Ver detalle";

        acciones.append(estado, btnDetalle);

        if (reserva.estado === "activa") {
            const btnCancelar = document.createElement("button");

            btnCancelar.type = "button";
            btnCancelar.className = "btn btn-cancel";
            btnCancelar.dataset.action = "cancelar";
            btnCancelar.dataset.id = reserva.id;
            btnCancelar.textContent = "Cancelar";

            acciones.appendChild(btnCancelar);
        }

        card.append(imagen, info, acciones);
        reservasContainer.appendChild(card);
    });
}


/* =========================
   PESTAÑAS
========================= */

tabButtons.forEach(button => {
    button.addEventListener("click", () => {
        tabActual = button.dataset.tab;

        tabButtons.forEach(item => {
            item.classList.remove("active");
            item.setAttribute("aria-selected", "false");
        });

        button.classList.add("active");
        button.setAttribute("aria-selected", "true");

        mostrarReservas();
    });
});


/* =========================
   ACCIONES
========================= */

reservasContainer.addEventListener("click", event => {
    const button = event.target.closest("button");

    if (!button) return;

    const id = Number(button.dataset.id);

    const reserva = reservas.find(item => item.id === id);

    if (!reserva) return;


    /* VER DETALLE */

    if (button.dataset.action === "detalle") {
        sessionStorage.setItem(
            "estacionamientoSeleccionado",
            JSON.stringify(reserva.estacionamiento)
        );

        window.location.href = "/detalle-estacionamiento";
        return;
    }


    /* CANCELAR */

    if (button.dataset.action === "cancelar") {
        const confirmar = confirm(
            "¿Deseas cancelar esta reserva?"
        );

        if (!confirmar) return;

        reserva.estado = "cancelada";

        guardarReservas();
        mostrarReservas();
    }
});


/* =========================
   INICIO
========================= */

mostrarReservas();
