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
