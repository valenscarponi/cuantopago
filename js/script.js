// DEJAR RADIUS ACTIVO

document.addEventListener("DOMContentLoaded", function() {
    const opcionSeleccionada = localStorage.getItem('opcionSeleccionada');
    if (opcionSeleccionada) {
    document.querySelector(`input[value="${opcionSeleccionada}"]`).checked = true;
    }
});

// Guardar la selección en localStorage cuando se selecciona una opción

document.querySelectorAll('input[name="radio1"]').forEach(input => {
    input.addEventListener('change', function() {
        localStorage.setItem('opcionSeleccionada', this.value);
    });
});

function validarDatos(){
    var contado = parseFloat(document.getElementById('OPCION1').value) || 0;
    var cuotas = parseFloat(document.getElementById('OPCION2').value) || 0;

    if (contado >= cuotas){
        return true;
    } else{
        alert ('Valor de las Cuotas Incorrecto');
        return false;
    }

}


function validarDatos2(){
    var credito = parseFloat(document.getElementById('CREDITO').value) || 0;
    var cuotas2 = parseFloat(document.getElementById('PROMEDIO').value) || 0;

    if (cuotas2 >= credito){
        return true;
    } else{
        alert ('Valor de las Cuotas Incorrecto');
        return false;
    }

}
