
const registroForm = document.getElementById("registroForm");

const password = document.getElementById("password");

const confirmPassword = document.getElementById("confirmPassword");

const mensaje = document.getElementById("registroMensaje");

const accountOptions = document.querySelectorAll(".account-option");


/* =========================
   TIPO DE CUENTA
========================= */

accountOptions.forEach(option => {

    const radio = option.querySelector("input");

    if (radio.checked) {
        option.classList.add("selected");
    } else {
        option.classList.remove("selected");
    }

    radio.addEventListener("change", () => {

        accountOptions.forEach(item => {
            item.classList.remove("selected");
        });

        option.classList.add("selected");

    });

});


/* =========================
   REGISTRO
========================= */

registroForm.addEventListener("submit", event => {

    mensaje.textContent = "";

    // Validar que las contraseñas coincidan
    if (password.value !== confirmPassword.value) {

        event.preventDefault();

        mensaje.textContent = "Las contraseñas no coinciden.";
        mensaje.style.color = "#B42318";

        return;
    }

    // Validar longitud
    if (password.value.length < 8) {

        event.preventDefault();

        mensaje.textContent =
            "La contraseña debe tener mínimo 8 caracteres.";

        mensaje.style.color = "#B42318";

        return;
    }

    // Si todo está correcto, dejamos que Laravel reciba el POST.

});
