<head>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<?php
// URL de la API
$url = 'https://api.bcra.gob.ar/estadisticas/v2.0/principalesvariables';
include "./index%282%29.php";

// Realizar la solicitud GET
$response = file_get_contents($url);
echo $response;
echo "<br>";

// Verificar si la solicitud fue exitosa
if ($response !== FALSE) {
    // Decodificar la respuesta JSON
    $data = json_decode($response, true); // true convierte a array asociativo
    
    // "idVariable": 29,
    // "cdSerie": 7933,
    // "descripcion": "Inflación esperada - REM próximos 12 meses - MEDIANA (variación en % i.a)",
    // "fecha": "2024-06-30",
    // "valor": 63.300000

    // "idVariable": 35,
    // "cdSerie": 7937,
    // "descripcion": "BADLAR en pesos de bancos privados (en % e.a.)",
    // "fecha": "2024-07-22",
    // "valor": 46.300000

    // Verificar si la decodificación fue exitosa
    if (json_last_error() === JSON_ERROR_NONE) {
        // Procesar los datos
        foreach ($data as $key => $value) {
            // Si el valor es un array, recórrelo
            if (is_array($value)) {
                // echo "Key: $key is an array:\n";
                foreach ($value as $subKey => $subValue) {
                    // echo "  SubKey: $subKey\n";
                    $proceso = 0;
                    foreach ($subValue as $innerKey => $innerValue) {
                        // echo "    $innerKey: $innerValue\n";
                        if ( $innerKey == 'idVariable' && $innerValue == 29){
                            $proceso = 1;
                        }
                        if ($proceso == 1) {
                            if ( $innerKey == 'valor'){
                                echo "Inflación Esperada próx. 12 meses : $innerValue\n";
                                $proceso = 0;
                            }


                        }

                        if ( $innerKey == 'idVariable' && $innerValue == 35){
                            $proceso = 2;
                        }
                         if ($proceso == 2) {
                            if ( $innerKey == 'valor'){  
                                echo "Tasa Efectiva Anual Plazo Fijo: $innerValue %\n";
                                $proceso = 0;
                            }
                             

                        }
                        

                        
                    }
                }
            } else {
                // echo "Key: $key; Value: $value\n";
            }
        }
    } else {
        echo "Error al decodificar JSON: " . json_last_error_msg();
    }
} else {
    echo "Error al consultar la API.";
}
?>