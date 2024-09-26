<head>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<?php

function CurlBcra(float $lado){

    // URL de la API
    $url = 'https://api.bcra.gob.ar/estadisticas/v2.0/principalesvariables';
    include "./index2.php";

    // Inicializar cURL
    $ch = curl_init();

    // Configurar cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Establecer tiempo de espera
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Omitir verificación SSL si es necesario

    // Realizar la solicitud GET
    $response = curl_exec($ch);

    // Verificar si hubo errores
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        // Decodificar la respuesta JSON
        $data = json_decode($response, true); // true convierte a array asociativo
        
        // Verificar si la decodificación fue exitosa
        if (json_last_error() === JSON_ERROR_NONE) {
            // Procesar los datos
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $subKey => $subValue) {
                        $proceso = 0;
                        foreach ($subValue as $innerKey => $innerValue) {
                            if ( $innerKey == 'idVariable' && $innerValue == 29){
                                $proceso = 1;
                            }
                            if ($proceso == 1) {
                                if ( $innerKey == 'valor'){

                                    // AGREGUÉ ESTO
                                    if ($innerValue > $formula2 ){
                                        echo "<li>Inflación Esperada próx. 12 meses : "."<span class='rojo'>". $innerValue."  %</span>  </li>";
                                    } else {
                                        echo "<li>Inflación Esperada próx. 12 meses : "."<span class='verde'>".$innerValue."  %</span> </li>";
                                    }
                                    $proceso = 0;
                                }
                            }

                            if ( $innerKey == 'idVariable' && $innerValue == 35){
                                $proceso = 2;
                            }
                            if ($proceso == 2) {
                                if ( $innerKey == 'valor'){

                                    // AGREGUÉ ESTO
                                    if ($innerValue > $formula2 ){
                                        echo "<li>Tasa Efectiva Anual Plazo Fijo: "."<span class='rojo'>".$innerValue."  %</span> </li>";
                                    } else {
                                        echo "<li>Tasa Efectiva Anual Plazo Fijo: "."<span class='verde'>".$innerValue."  %</span> </li>";
                                    }
                                    $proceso = 0;
                                }
                            }
                        }
                    }
                }
            }
        } else {
            echo "Error al decodificar JSON: " . json_last_error_msg();
        }
    }

    // Cerrar cURL
    curl_close($ch);
}
?>

