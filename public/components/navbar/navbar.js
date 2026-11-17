/* =========================
   NAVEGACIÓN Y SESIÓN (LARAVEL)
========================= */

const logoutButton = document.getElementById("logoutButton");
const navbarBrand = document.getElementById("navbarBrand");
const navbarHome = document.getElementById("navbarHome");

const currentPath = window.location.pathname;

// Mapa para convertir enlaces estáticos .html de navbar.html a rutas de Laravel
const mapaRutasLaravel = {
    "index.html": "/",
    "inicio.html": "/",
    "login.html": "/login",
    "registro.html": "/registro",
    "busqueda.html": "/busqueda",
    "nosotros.html": "/nosotros",
    "servicios.html": "/servicios",
    "contacto.html": "/contacto",
    "perfil.html": "/perfil",
    "reservas.html": "/reservas",
    "espacios.html": "/estacionamientos"
};

document.querySelectorAll("#navbar a[href]").forEach(link => {
    const href = link.getAttribute("href");
    if (!href) return;

    const archivo = href.split("/").pop();
    if (mapaRutasLaravel[archivo]) {
        link.setAttribute("href", mapaRutasLaravel[archivo]);
    }
});

// Detectar modo de sesión desde Blade (data-navbar-mode) o localStorage
const modoBlade = document.body.dataset.navbarMode;
const sesionActiva =
    modoBlade === "user" ||
    localStorage.getItem("sesionActiva") === "true";

const paginasPrivadas = [
    "/reservas",
    "/estacionamientos",
    "/perfil"
];

if (paginasPrivadas.includes(currentPath) && !sesionActiva) {
    sessionStorage.setItem("redirectAfterLogin", currentPath);
    window.location.replace("/login");
}

if (navbarBrand) {
    navbarBrand.href = "/";
}

if (navbarHome) {
    navbarHome.href = "/";
}

const paginasDeAcceso = ["/login", "/registro"];

if (paginasDeAcceso.includes(currentPath)) {
    document.body.dataset.navbarMode = "guest";
} else if (!modoBlade) {
    document.body.dataset.navbarMode = sesionActiva ? "user" : "guest";
}

/* =========================
   PÁGINA ACTIVA
========================= */

document.querySelectorAll(".nav-link").forEach(link => {
    const href = link.getAttribute("href");
    if (!href) return;

    if (href === currentPath && link.offsetParent !== null) {
        link.classList.add("active");
        link.setAttribute("aria-current", "page");
    }
});

/* =========================
   CERRAR COLLAPSE AL NAVEGAR
========================= */

document.querySelectorAll("#navbarLinks a.nav-link").forEach(link => {
    link.addEventListener("click", () => {
        const collapseElement = document.getElementById("navbarLinks");
        if (collapseElement && window.bootstrap) {
            const instance = bootstrap.Collapse.getInstance(collapseElement);
            if (instance) {
                instance.hide();
            }
        }
    });
});

/* =========================
   CERRAR SESIÓN
========================= */

if (logoutButton) {
    logoutButton.addEventListener("click", cerrarSesion);
}

function cerrarSesion(e) {
    if (e) e.preventDefault();

    localStorage.removeItem("sesionActiva");
    localStorage.removeItem("usuarioSesion");
    localStorage.removeItem("usuarioActual");

    sessionStorage.removeItem("estacionamientoSeleccionado");
    sessionStorage.removeItem("reservaPendiente");
    sessionStorage.removeItem("redirectAfterLogin");

    window.location.href = "/";
}