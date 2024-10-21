<?php

function calcular($param1, $param2, $param3) {
// Función que calcula la tasa de interés
//FUNCION DE CALCULO DE INTERES
//$param1 = isset($_GET['param1']) ? $_GET['param1'] : null;
//$param2 = isset($_GET['param2']) ? $_GET['param2'] : null;
//$param3 = isset($_GET['param3']) ? $_GET['param3'] : null;

$param1 = floatval($param1);
$param2 = floatval($param2);
$param3 = intval($param3);

// Llamar a la función con los parámetros

try {
    $tasa = calcularTasaInteres($param1, $param2, $param3);
    $formula = pow(1+$tasa,12);
    $formula1 =$formula -1;
    $formula2 = $formula1 * 100;

    //echo $tasa."    ".$formula2;
    //die();
    return $formula2;

} 

catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
}

function calcularTasaInteres($valorPresente, $cuota, $numeroPeriodos) {
    if ($numeroPeriodos <= 2) {
        if ($numeroPeriodos == 1) {
            $tasa = ($cuota - $valorPresente) / $valorPresente;
            return $tasa;
        } elseif ($numeroPeriodos == 2) {
            $tasa = 0.01; // Tasa inicial (1%)
            $tolerancia = 0.00001; // Precisión del cálculo
            $maxIteraciones = 1000; // Número máximo de iteraciones

            for ($iter = 0; $iter < $maxIteraciones; $iter++) {
                $tasaDecimal = $tasa;
                
                // Calcular el valor presente usando la tasa actual
                $factor1 = 1 / (1 + $tasaDecimal);
                $factor2 = $factor1 * $factor1;
                $valorCalculado = $cuota * ($factor1 + $factor2);

                // Calcular la diferencia entre el valor calculado y el valor presente
                $diferencia = $valorCalculado - $valorPresente;

                // Calcular la derivada para el método de Newton-Raphson
                $derivada = -$cuota * ($factor1 + 2 * $factor2) / (1 + $tasaDecimal);

                // Ajustar la tasa usando el método de Newton-Raphson
                if ($derivada == 0) {
                    throw new Exeption("La derivada es cero, no se puede continuar.");
                }

                $tasaNueva = $tasaDecimal - ($diferencia / $derivada);

                // Verificar la tolerancia
                if (abs($tasaNueva - $tasaDecimal) < $tolerancia) {
                    return $tasaNueva; // Devolver la tasa en formato decimal
                }

                $tasa = $tasaNueva;
            }

            throw new Exception("No se pudo encontrar la tasa de interés con la precisión deseada.");
        }
    }

    // Método de Newton-Raphson para más de 2 cuotas
    $tasa = 0.01; // Tasa inicial (1%)
    $tolerancia = 0.00001; // Precisión del cálculo
    $maxIteraciones = 1000; // Número máximo de iteraciones

    for ($iter = 0; $iter < $maxIteraciones; $iter++) {
        $tasaDecimal = $tasa;
        
        // Calcular el valor presente usando la tasa actual
        $factor = pow(1 + $tasaDecimal, -$numeroPeriodos);
        $valorCalculado = ($cuota * (1 - $factor)) / $tasaDecimal;

        // Calcular la diferencia entre el valor calculado y el valor presente
        $diferencia = $valorCalculado - $valorPresente;

        // Calcular la derivada para el método de Newton-Raphson
        $factorDerivada = pow(1 + $tasaDecimal, -$numeroPeriodos);
        $derivada = ($cuota * $factorDerivada * $numeroPeriodos) / $tasaDecimal - ($cuota * (1 - $factorDerivada)) / pow($tasaDecimal, 2);

        // Ajustar la tasa usando el método de Newton-Raphson
        if ($derivada == 0) {
            throw new Exeption("La derivada es cero, no se puede continuar.");
        }

        $tasaNueva = $tasaDecimal - ($diferencia / $derivada);

        // Verificar la tolerancia
        if (abs($tasaNueva - $tasaDecimal) < $tolerancia) {
            return $tasaNueva; // Devolver la tasa en formato decimal
        }

        $tasa = $tasaNueva;
    }

    throw new Exception("No se pudo encontrar la tasa de interés con la precisión deseada.");
}

?>