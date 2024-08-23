
function validarDatos(){
    var contado = document.getElementById('OPCION1').value || 0;
    var cuotas = document.getElementById('OPCION2').value || 0;

    if (contado >= cuotas){
        true;
    } else{
        alert ('Valor de las Cuotas Incorrecto');
        false;
    }

}


function validarDatos2(){
    var credito = document.getElementById('CREDITO').value || 0;
    var cuotas2 = document.getElementById('PROMEDIO').value || 0;

    if (cuotas2 <= credito){
        alert ('Valor de las Cuotas Incorrecto');
        false;
    } else{
        true;
    }

}


// function coloresResultado{
    
// }