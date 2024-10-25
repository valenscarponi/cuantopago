<?php
// index.php

// Habilitar CORS para permitir acceso a la API desde cualquier lugar
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Incluir las funciones que vamos a exponer como API
require_once 'CurlApi.php';


// Obtener el método de la solicitud (GET, POST, etc.)
//$method = $_SERVER['REQUEST_METHOD'];

$resultado = CurlBcra();
//echo $resultado;

//die();

// Devolver el resultado en formato JSON
echo json_encode($resultado);

?>