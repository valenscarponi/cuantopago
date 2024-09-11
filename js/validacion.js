function sumar() {
    var neto21 = parseFloat(document.getElementById("neto21").value) || 0;
    var neto10_5 = parseFloat(document.getElementById("neto10_5").value) || 0;
    var neto27 = parseFloat(document.getElementById("neto27").value) || 0;

    var exento = parseFloat(document.getElementById("exento").value) || 0;
    var nogravado = parseFloat(document.getElementById("nogravado").value) || 0;
    var impuestos = parseFloat(document.getElementById("impuestos").value) || 0;
    var percepciones = parseFloat(document.getElementById("percepciones").value) || 0;
    var retenciones = parseFloat(document.getElementById("retenciones").value) || 0;
    var gastos = parseFloat(document.getElementById("gastos").value) || 0;

    var iva21 = neto21 * 0.21;
    var iva10_5 = neto10_5 * 0.105;
    var iva27 = neto27 * 0.27;

    document.getElementById("iva21").value = iva21.toFixed(2);
    document.getElementById("iva10_5").value = iva10_5.toFixed(2);
    document.getElementById("iva27").value = iva27.toFixed(2);

    var total = neto21 + iva21 + neto10_5 + iva10_5 + neto27 + iva27 + exento + nogravado + impuestos + percepciones + retenciones + gastos;
    document.getElementById("total").value = total.toFixed(2);
}

function validarTotal () {
    var neto21 = parseFloat(document.getElementById("neto21").value) || 0;
    var neto10_5 = parseFloat(document.getElementById("neto10_5").value) || 0;
    var neto27 = parseFloat(document.getElementById("neto27").value) || 0;
    
    var exento = parseFloat(document.getElementById("exento").value) || 0;
    var nogravado = parseFloat(document.getElementById("nogravado").value) || 0;
    var impuestos = parseFloat(document.getElementById("impuestos").value) || 0;
    var percepciones = parseFloat(document.getElementById("percepciones").value) || 0;
    var retenciones = parseFloat(document.getElementById("retenciones").value) || 0;
    var gastos = parseFloat(document.getElementById("gastos").value) || 0;
    
    var iva21  =  parseFloat(document.getElementById("iva21").value) || 0;
    var iva10_5 =  parseFloat(document.getElementById("iva10_5").value) || 0;
    var iva27  =  parseFloat(document.getElementById("iva27").value) || 0;
    
    var total = parseFloat(document.getElementById("total").value) || 0;
    
    let sumaParciales = parseFloat(neto21 + iva21 + neto10_5 + iva10_5 + neto27 + iva27 + exento + nogravado + impuestos + percepciones + retenciones + gastos);
    sumaParciales = sumaParciales.toFixed(2);
    if(total != sumaParciales){
        
        alert('El total es diferente a la suma de los parciales.' + sumaParciales + " y " + total);
        return false;
       
    }
    else
    {
        return true;
    }
}    
//     if (document.getElementById("neto21").value != null) {
//       //me cambian el neto
//       neto21 = parseFloat(document.getElementById("neto21").value);
//       alicuota = 21;
//       iva21 = neto21 * alicuota / 100;
//       iva21 = parseFloat(iva21.toFixed(2));
//       document.getElementById("iva21").value = iva21;
//      }
//      else
//      {
//         neto21 = 0;
//         iva21 = 0;
//      }

//      if (document.getElementById("neto10_5").value != null) {
//       //me cambian la alicuota
//       neto10_5 = parseFloat(document.getElementById("neto10_5").value);
//       alicuota = 10.5;
//       iva10_5 = neto10_5 * alicuota / 100;
//       iva10_5 = parseFloat(iva10_5.toFixed(2));
//       document.getElementById("iva10_5").value = iva10_5;
//      }
//      else
//      {
//         neto10_5 = 0;
//         iva10_5 = 0;
//      }

//      if (document.getElementById("neto27").value != null) {
//         neto27 = parseFloat(document.getElementById("neto27").value);
//         alicuota = 27;
//         iva27 = neto27 * alicuota / 100;
//         iva27 = parseFloat(iva27.toFixed(2));
//         document.getElementById("iva27").value = iva27;
//      }   
//     else
//     {
//         neto27 = 0;
//         iva27 = 0;
//     }
//     total = 0;
//     total =  neto21 + iva21 + neto10_5 + iva10_5 +  neto27 + iva27;
//     document.getElementById("total").value = total;
// }
