
document.addEventListener('DOMContentLoaded', function () {

    
    const tabButtons = document.querySelectorAll('.tab-button');

    
    const panelActivas = document.getElementById('panelActivas');
    const panelHistorial = document.getElementById('panelHistorial');

    
    tabButtons.forEach(button => {

        button.addEventListener('click', function () {

            const tabSeleccionada = this.dataset.tab;

            // Quitar la clase activa de todas las pestañas
            tabButtons.forEach(tab => {

                tab.classList.remove('active');

                tab.setAttribute('aria-selected', 'false');

            });

            
            this.classList.add('active');

            this.setAttribute('aria-selected', 'true');

            // Mostrar el panel correspondiente
            if (tabSeleccionada === 'activas') {

                panelActivas.hidden = false;
                panelHistorial.hidden = true;

            } else {

                panelActivas.hidden = true;
                panelHistorial.hidden = false;

            }

        });

    });

  

const estacionamientoSelect =
    document.getElementById('estacionamiento_id');

const horaEntrada =
    document.getElementById('horaEntrada');

const horaSalida =
    document.getElementById('horaSalida');

const precioEstimado =
    document.getElementById('precioEstimado');

function calcularPrecio() {

    if (
        !estacionamientoSelect ||
        !horaEntrada ||
        !horaSalida ||
        !precioEstimado
    ) {
        return;
    }

    const opcion = estacionamientoSelect.selectedOptions[0];

    const precio = Number(opcion?.dataset.precio || 0);

    if (!horaEntrada.value || !horaSalida.value) {
        precioEstimado.textContent = '$0.00 MXN';
        return;
    }

    const entrada = horaEntrada.value.split(':').map(Number);
    const salida = horaSalida.value.split(':').map(Number);

    const minutosEntrada = entrada[0] * 60 + entrada[1];
    const minutosSalida = salida[0] * 60 + salida[1];

    const duracion = (minutosSalida - minutosEntrada) / 60;

    if (duracion <= 0) {
        precioEstimado.textContent = 'Horario no válido';
        return;
    }

    const total = precio * duracion;

    precioEstimado.textContent =
        '$' + total.toFixed(2) + ' MXN';
}

estacionamientoSelect?.addEventListener('change', calcularPrecio);
horaEntrada?.addEventListener('change', calcularPrecio);
horaSalida?.addEventListener('change', calcularPrecio);

calcularPrecio();

});
