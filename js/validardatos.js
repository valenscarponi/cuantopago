function validarDatos(){
    var contado = parseFloat(document.getElementById('OPCION1').value) || 0;
    var cuotas = parseFloat(document.getElementById('OPCION2').value) || 0;
    var cantidad_cuotas = parseFloat(document.getElementById('OPCION3').value) || 0;

    
    if (contado <= cuotas * cantidad_cuotas){
        return true;
    } else{
        alert ('Valor de las Cuotas Incorrecto');
        return false;
    }

}





function validarDatos2(){
    var credito = parseFloat(document.getElementById('CREDITO').value) || 0;
    var cuotas = parseFloat(document.getElementById('PROMEDIO').value) || 0;
    var cantidad_cuotas = parseFloat(document.getElementById('CUOTAS').value) || 0;

    if (credito <= cuotas * cantidad_cuotas){
        return true;
    } else{
        alert ('Valor de las Cuotas Incorrecto');
        return false;
    }

}
