<?php
// index.php

// Habilitar CORS para permitir acceso a la API desde cualquier lugar
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Incluir las funciones que vamos a exponer como API
require_once 'calculo.php';


// Obtener el método de la solicitud (GET, POST, etc.)
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    // Verificar si los parámetros están presentes
    if (isset($_GET['param1']) && isset($_GET['param2']) && isset($_GET['param3'])) {
        
        $param1 = isset($_GET['param1']) ? $_GET['param1'] : null;
        $param2 = isset($_GET['param2']) ? $_GET['param2'] : null;
        $param3 = isset($_GET['param3']) ? $_GET['param3'] : null;

        $param1 = floatval($param1);
        $param2 = floatval($param2);
        $param3 = intval($param3);

        //$param1 = $_GET['param1'];
        //$param2 = $_GET['param2'];
        //$param3 = $_GET['param3'];

        //echo "Valor Contado: ".$param1."<br>";
        //echo "Valor Cuota: ".$param2."<br>";
        //echo "Cantidad de Cuotas: ".$param3."<br>";

        //include 'calculo.php';

        //die();

        // Aquí llamamos a una función que use estos tres parámetros
        $resultado =calcular($param1, $param2, $param3);
        //echo $resultado;

        //die();

        // Devolver el resultado en formato JSON
        echo json_encode($resultado);
    } else {
        echo json_encode(['error' => 'Se requieren los parámetros param1, param2 y param3.']);
    }
} else {
    echo json_encode(['error' => 'Método no permitido.']);

}

?>