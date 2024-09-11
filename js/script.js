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

