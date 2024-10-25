<?php
function CurlBcra(){

    // URL de la API
    $url = 'https://api.bcra.gob.ar/estadisticas/v2.0/principalesvariables';

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
                                    $proceso = 0;
                                     // Cerrar cURL
                                    curl_close($ch);
                                    return $innerValue;
                                }
                            }
                        }
                    }
                }
            }
        } else {
            echo "Error al decodificar JSON: " . json_last_error_msg();
             // Cerrar cURL
            curl_close($ch);
        }
    }

}
?>