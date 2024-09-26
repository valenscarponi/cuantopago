// DEJAR RADIUS ACTIVO

document.addEventListener("DOMContentLoaded", function() {
    const opcionSeleccionada = localStorage.getItem('opcionSeleccionada');
    if (opcionSeleccionada) {
    document.querySelector(`input[value="${opcionSeleccionada}"]`).checked = true;
    }
});

// Guardar la selección en localStorage cuando se selecciona una opción

// PARA INDEX
document.querySelectorAll('input[name="radio1"]').forEach(input => {
    input.addEventListener('change', function() {
        localStorage.setItem('opcionSeleccionada', this.value);
    });
});

// PARA FINANZAS
document.querySelectorAll('input[name="radio2"]').forEach(input => {
    input.addEventListener('change', function() {
        localStorage.setItem('opcionSeleccionada', this.value);
    });
});
// Link 

function enviarFormulario(accion){
    document.getElementById('form-principal').action = accion;
}

// function red() { 
//     location.href = "./finanzas.php"; 
// }

function validarDatos() {
    var contado = parseFloat(document.getElementById('OPCION1').value) || 0;
    var cuotas = parseFloat(document.getElementById('OPCION2').value) || 0;
    var cantidad_cuotas = parseFloat(document.getElementById('OPCION3').value) || 0;

    if (contado <= (cuotas * cantidad_cuotas)) {
        return true;
    } else {
        alert('Valor de las Cuotas Incorrecto');
        return false;
    }
}

function validarDatos2() {
    var credito = parseFloat(document.getElementById('CREDITO').value) || 0;
    var cuota = parseFloat(document.getElementById('PROMEDIO').value) || 0;
    var cantidades_cuotas = parseFloat(document.getElementById('CUOTAS').value) || 0;

    if (credito <= (cuota * cantidades_cuotas)) {
        return true;
    } else {
        alert('Valor de las Cuotas Incorrecto');
        return false;
    }
}
