<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
       <!--SEO-->
    <meta name="description" 
        content="Calculadora de Costo Financiero Total que permite comparar dicho costo con la inflación proyectada a 12 meses y la tasa efectiva anual de plazo fijo.">

    <meta name="keywords"
        content="calculadora de cuotas, calculadora financiera, cuanto me va a costar, calcular plazo fijo, calcular billetera virtual, cuanto me cuesta con descuento, me conviene comprar, totoras, cuanto pago, economia, economia familiar, costo financiero total,plazo fijo, billetra virtual, cuanto necesito para pagar un producto en cuotas, me conviene invertir, costo financiero total de una compra, calcular intereses de una compra">
    <meta name="robots" content="index, follow">

    <meta property="og:title"
        content="Calculadora de Costo Financiero Total de los datos de una compra">
    <meta property="og:description"
        content="Calculadora de Costo Financiero Total que permite comparar dicho costo con la inflación proyectada a 12 meses y la tasa efectiva anual de plazo fijo.">
    <meta property="og:url" content="https://www.cuantopago.com.ar">
    <meta property="og:type" contentit="website">
    <meta property="og:image" content="https://cuantopago.com.ar/img/logo.jpg">

    <meta name="description" content="Calculadora de Costo Financiero Total">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo-modified.png" type="image/x-icon">
    <link rel="preload" href="./css/styles.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="preload" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <title>CuantoPago</title>

         <!-- Datos Estructurados (Structured Data) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "Calculadora de Costo Financiero: ¿Comprar al Contado o en Cuotas?",
      "description": "Compara si te conviene pagar al contado con descuento o en cuotas con recargo. Calcula fácilmente el costo financiero total",
      "url": "https://www.cuantopago.com.ar",
      "publisher": {
        "@type": "Organization",
        "name": "IES 48 - Totoras - Argentina"
      }
    }
    </script>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7831754402905930"
     crossorigin="anonymous"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M74TEQ2QWM"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-M74TEQ2QWM');
    </script>

</head>


<body>

    <!-- FORMULARIO PRINCIPAL -->

    <main class="container">

        <!-- IMAGEN -->
        
        <div class="container__imagen">
            <img class="logo" src="./img/logo.jpg" alt="Logo">
        </div>

        <!-- TITULO -->

        <div class="container__presentacion">
            <div class="container__contenido">
                <h1 class="container__title no-margin">¿Cuánto Pago?</h1>
                <p>Calculadora de Costo Financiero Total</p>
            </div>
            <div class="container__icono">
                <a href="https://www.instagram.com/cuantopagoapp?igsh=YXBmYnFmeWs2dHhx" target="_blank"><i class="fa-brands fa-instagram" style="color: #0a1828; font-size: 2rem"></i></a>
            </div>

        </div>

        <!-- FORMULARIO DE CHECKBOX -->

        <form class="form__principal" id="form-principal" action="" method="get">
            <legend class="form__title">Ingrese datos:</legend>
            <fieldset class="form__fielset">
                <div class="form__fielset__input-checkbox">
                    <label class="campo__label f-size" for="coutas">Si pago en CUOTAS: Tengo Recargo.</label> 
                    <input class="input__radio" type="radio" name="radio1" id = "coutas" value="cuotas">
                </div>

                <div class="form__fielset__input-checkbox">
                    <label class="campo__label f-size" for="contado">Si pago de CONTADO: Tengo Descuento. </label> 
                    <input class="input__radio" type="radio" name="radio1" id= "contado" value="contado">
                </div>

                <div class="form__fielset__input-checkbox">
                    <label class="campo__label f-size" for="credito">Obtener un Préstamo.</label> 
                    <input class="input__radio" type="radio" name="radio1" id = "credito" value="credito">
                </div>
                
                <div class="form__fielset__button-inicio">
                    <input class = "btn-form" type="submit" name="" value="Siguiente" >
                    <input class = "btn-form" type="submit" name="" value="Invertir" onclick="enviarFormulario('./finanzas.php')">
                </div>
            </fieldset>
        </form>
    </main>


<?php
include 'CurlApi.php';
// CALCULO DE COMPRA DE PRODUCTO
if (isset($_GET['radio1'])) {

if ($_GET['radio1']=="cuotas")///
{?>

    <!-- PAGO EN COUTAS -->

    <form class="form" id="form1"  method="get" onsubmit="return validarDatos()">
        <legend>Si pago en Cuotas: Tengo Recargo.</legend>
        <fieldset class="form__fielset">
            <div class="form__fielset__input">
                <label class="campo__label" for="OPCION1">Importe de Contado</label> 
                <div class="input">
                    <p class="signo">$</p>
                    <input class="campo__field" min = "0" type="number" name="OPCION1" id="OPCION1" autofocus value="" required >
                </div>
            </div>

            <div class="form__fielset__input">
                <label class="campo__label" for="OPCION2">Cuota Promedio a Abonar</label>
                <div class="input">
                    <p class="signo">$</p>
                    <input class="campo__field" min = "0" type="number" name="OPCION2" id="OPCION2" value="" required>
                </div>
            </div>

            <div class="form__fielset__input">
                <label class="campo__label" for="OPCION3">Cantidad de Cuotas</label>
                <div class="input">
                    <p class="signo">c/c</p>
                    <input class="campo__field" min = "0" type="number" name="OPCION3" id="OPCION3" value="" required>
                </div>

            </div>
            <div class="form__fielset__button">
                <input type="submit" name="Subir" value="Calcular" >
            </div>
        </fieldset>
    </form>

<?php
}}
if (isset($_GET['OPCION1']) && isset($_GET['OPCION2']) && isset($_GET['OPCION3'])){
    $numero1 = $_GET['OPCION1'];
    $numero2 = $_GET['OPCION2'];
    $numero3 = $_GET['OPCION3'];

    // VALOR DEL PRODUCTO EN COUTAS
    $calculo = $numero2*$numero3;

    // CALCULO DEL CFT
    $valorPresente = $_GET['OPCION1']; // Valor presente del préstamo
    $cuota = $_GET['OPCION2']; // Cuota periódica
    $numeroPeriodos = $_GET['OPCION3']; // Número total de períodos (por ejemplo, 24 meses)
     try {
        $tasa = calcularTasaInteres($valorPresente, $cuota, $numeroPeriodos);
        $formula = pow(1+$tasa,12);
        $formula1 =$formula -1;
        $formula2 = $formula1 * 100;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
   
   // LO QUE MUESTRA POR PANTALLA
    echo "<div class = 'resultado' id='resultado1' tabindex='-1'>";
        echo "<h3 class = 'margin'>Datos de la Operación: </h3>";

        echo "<ul>";
            echo "<li>Abonar de Contado: $". number_format($numero1, 2, ',','.') ."</li>";
            echo "<li>Total a Abonar en Cuotas: $". number_format($calculo, 2, ',','.') ."</li>";
            // echo "<li>Valor de cada cuota en promedio $numero2 </li>";
            // echo "<li>Cantidad de coutas $numero3 </li>";
            echo "<li class = 'tamaño'>CFT (Costo Financiero Total) Anual: ". number_format($formula2, 2, ',','.') ."% </li>";
        echo "</ul>";

        
        // echo "<abbr title='El CFT representa el costo total de un préstamo o servicio financiero, expresado como una tasa anual. A diferencia de la Tasa Nominal Anual (TNA), el CFT incluye todos los costos asociados, como intereses, seguros y gastos administrativos.
        //     El CFT proporciona una visión completa de los costos reales de un préstamo o servicio financiero'><i class='fa-solid fa-circle-question'></i></abbr> ";


        echo "<h4 class = 'margin'>Referencias</h4>";
        CurlBcra(3);
        // echo "<abbr title='Referencias: El CFT proporciona una visión completa de los costos reales de un préstamo o servicio financiero y debe ser comparado con otras variables, para tomar una adecuada decisión financiera.'><i class='fa-solid fa-circle-question'></i></abbr> ";
        echo "<ul>";
            echo "<p class = 'font-s'>El CFT representa el costo total de un préstamo o servicio financiero, expresado como una tasa anual. A diferencia de la Tasa Nominal Anual (TNA), el CFT incluye todos los costos asociados, como intereses, seguros y gastos administrativos.</p>";
            echo "<p class = 'font-s'>El CFT proporciona una visión completa de los costos reales de un préstamo o servicio financiero y debe ser comparado con otras variables (Referencias), para tomar una adecuada decisión financiera.</p>";
        echo "</ul>";
        
    echo "</div>";
        
    echo "<script>
    window.onload = function() {
        document.getElementById('resultado1').focus();  // Establece el enfoque en el div cuando la página se cargue
    };
    </script>";
    
    echo "<div class='form__fielset__button'>";
        echo "<input class = 'btn-form' type='submit' name='' value='Volver a Inicio' onclick=\"window.location.href='./index.php';\">";
    echo "</div>";

}


//CALCULO DE COMPRA POR CONTADO

if (isset($_GET['radio1'])) {
if ($_GET['radio1']=="contado"){

?>
    <!-- PAGO EN CONTADO -->

    <form class="form" id="form2"  method="get">
        <legend>Pago en Contado</legend>
        <fieldset class="form__fielset">
            <div class="form__fielset__input">
                <label class="campo__label" for="DATO1">Importe Financiado</label> 
                
                <div class="input">
                    <p class="signo">$</p>
                    <input class="campo__field" min = "0" type="number" name="DATO1"  id="DATO1" value="" required autofocus>
                </div>
            </div>

            <div class="form__fielset__input">
                <label class="campo__label" for="DATO2">Porcentaje de Descuento por Pago Contado</label>
                <div class="input">
                    <p class="signo">%</p>
                    <input class="campo__field" min = "0" type="number" name="DATO2" id="DATO2" value="" required>
                </div>
            </div>

            <div class="form__fielset__input">
                <label class="campo__label" for="DATO3">Cantidad de Cuotas</label>
                <div class="input">
                    <p class="signo">c/c</p>
                    <input class="campo__field" min = "0" type="number" name="DATO3" id="DATO3" value="" required>
                </div>
            </div>

            <div class="form__fielset__button">
                <input type="submit" name="Subir" value="Calcular">
            </div>
        </fieldset>
    </form>
<?php
}}
if (isset($_GET['DATO1']) && isset($_GET['DATO2']) && isset($_GET['DATO3'])) {

    $precio = $_GET['DATO1'];
    $descuento = $_GET['DATO2'];
    $cuotas = $_GET['DATO3'];


    //CALCULO DE DESCUENTO

    $calculodesc = $precio * (1-$descuento/100);
    
    $importecouta = $precio/$cuotas;


    // CALCULO DEL CFT
    $valorPresente = $calculodesc; // Valor presente del préstamo
    $cuota1 = $importecouta; // Cuota periódica
    $numeroPeriodos = $cuotas; // Número total de períodos (por ejemplo, 24 meses)
     try {
        $tasa = calcularTasaInteres($valorPresente, $cuota1, $numeroPeriodos);
        $formula = pow(1+$tasa,12);
        $formula1 =$formula -1;
        $formula2 = $formula1 * 100;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } 

    //LO QUE MUESTRA POR PANTALLA
    echo "<div class = 'resultado' id='resultado2' tabindex='-1'>";
        echo "<h3 class = 'margin'>Datos de la Operación: </h3>";
        echo "<ul>";
            echo "<li>Abonar de Contado: $". number_format($calculodesc, 2, ',','.') . "</li>";
            echo "<li>Total a Abonar en Cuotas: $". number_format($precio, 2, ',','.') ."</li> ";
            echo "<li class = 'tamaño' >CFT (Costo Financiero Total) Anual: ". number_format($formula2 , 2, ',','.')."% </li>";
        echo "</ul>";


        // echo "<abbr title='El CFT representa el costo total de un préstamo o servicio financiero, expresado como una tasa anual. A diferencia de la Tasa Nominal Anual (TNA), el CFT incluye todos los costos asociados, como intereses, seguros y gastos administrativos.
        //     El CFT proporciona una visión completa de los costos reales de un préstamo o servicio financiero'><i class='fa-solid fa-circle-question'></i></abbr> ";
        
        
        echo "<h4 class = 'margin'>Referencias</h4>";
        CurlBcra(3);
        // echo "<abbr title='Referencias: El CFT proporciona una visión completa de los costos reales de un préstamo o servicio financiero y debe ser comparado con otras variables, para tomar una adecuada decisión financiera.'><i class='fa-solid fa-circle-question'></i></abbr> ";
        echo "<ul>";
            echo "<p class = 'font-s'>El CFT representa el costo total de un préstamo o servicio financiero, expresado como una tasa anual. A diferencia de la Tasa Nominal Anual (TNA), el CFT incluye todos los costos asociados, como intereses, seguros y gastos administrativos.</p>";
            echo "<p class = 'font-s'>El CFT proporciona una visión completa de los costos reales de un préstamo o servicio financiero y debe ser comparado con otras variables (Referencias), para tomar una adecuada decisión financiera.</p>";
        echo "</ul>";
    echo "</div>";

    
    echo "<script>
    window.onload = function() {
        document.getElementById('resultado2').focus();  // Establece el enfoque en el div cuando la página se cargue
    };
    </script>";
    
    echo "<div class='form__fielset__button'>";
        echo "<input class = 'btn-form' type='submit' name='' value='Volver a Inicio' onclick=\"window.location.href='./index.php';\">";
    echo "</div>";
}





// CALCULO DE CREDITO

if (isset($_GET['radio1'])) {   
if ($_GET['radio1']=="credito"){
?>
    <!-- OBTENER UN PRESTAMO -->

    <form class="form" id="form3"  method="get" onsubmit="return validarDatos2()">
        <legend>Obtener un Préstamo</legend>
        <fieldset class="form__fielset">
            <div class="form__fielset__input">
                <label class="campo__label" for="CREDITO">Importe del Préstamo Solicitado</label> 
                <div class="input">
                    <p class="signo">$</p>
                    <input class="campo__field" min = "0" type="number" name="CREDITO" id= "CREDITO" value="" required autofocus>
                </div>
            </div>

            <div class="form__fielset__input">
                <label class="campo__label" for="PROMEDIO">Cuota Promedio Abonar</label>
                <div class="input">
                    <p class="signo">$</p>
                    <input class="campo__field" min = "0" type="number" name="PROMEDIO" id = "PROMEDIO" value="" required>
                </div>
            </div>

            <div class="form__fielset__input">
                <label class="campo__label" for="COUTAS">Cantidad de Cuotas</label>
                <div class="input">
                    <p class="signo">c/c</p>
                    <input class="campo__field" min = "0" type="number" name="CUOTAS" id = "CUOTAS" value="" required>
                </div>
            </div>
            <div class="form__fielset__button">
                <input type="submit" name="Subir" value="Calcular">
            </div>
        </fieldset>
    </form>
<?php
}}




if (isset($_GET['CREDITO']) && isset($_GET['PROMEDIO']) && isset($_GET['CUOTAS'])){
    $numero1 = $_GET['CREDITO'];
    $numero2 = $_GET['PROMEDIO'];
    $numero3 = $_GET['CUOTAS'];


    $calculo = $numero2 * $numero3;
    
    
     // CALCULO DEL CFT
    $valorPresente = $_GET['CREDITO']; // Valor presente del préstamo
    $cuota = $_GET['PROMEDIO']; // Cuota periódica
    $numeroPeriodos = $_GET['CUOTAS']; // Número total de períodos (por ejemplo, 24 meses)
 
 
 
try {
     // Llamar a la función para calcular la tasa de interés
     $tasa = calcularTasaInteres($valorPresente, $cuota, $numeroPeriodos);
     $formula = pow(1+$tasa,12);
     $formula1 =$formula -1;
     $formula2 = $formula1 * 100;
    } catch (Exception $e) {
     echo "Error: " . $e->getMessage();
    }
    
    // LO QUE MUESTRA POR PANTALLA
    
    echo "<div class= 'resultado' id='resultado3' tabindex='-1'>";

        echo "<h3 class = 'margin'>Datos de la Operación.</h3>";

        echo "<ul>";
            echo "<li>Importe Préstamo Solicitado: $". number_format($numero1, 2, ',','.') ."</li>";
            echo "<li>Importe Total a Abonar en Cuotas: $". number_format($calculo, 2, ',','.') ."</li>";
            // echo "<li>Valor de cada couta en promedio $numero2 </li>";
            // echo "<li>Cantidad de coutas $numero3 </li>";

            echo "<li class = 'tamaño' >CFT (Costo Financiero Total) Anual: ". number_format($formula2, 2, ',','.') ."% </li>";
            // if ($numero1 > $formula2){
            // } else{
            //     echo "<li>CFT (Costo Financiero Total) Anual: ". "<span class='verde'>". number_format($formula2, 2) ."</span> % </li>";    
            // }

        echo "</ul>";    
        // echo "<abbr title='El CFT representa el costo total de un préstamo o servicio financiero, expresado como una tasa anual. A diferencia de la Tasa Nominal Anual (TNA), el CFT incluye todos los costos asociados, como intereses, seguros y gastos administrativos.
        //     El CFT proporciona una visión completa de los costos reales de un préstamo o servicio financiero'><i class='fa-solid fa-circle-question'></i></abbr> ";
    

    
        echo "<h4 class = 'margin'>Referencias</h4>";
        CurlBcra(3);
        // echo "<abbr title='Referencias: El CFT proporciona una visión completa de los costos reales de un préstamo o servicio financiero y debe ser comparado con otras variables, para tomar una adecuada decisión financiera.'><i class='fa-solid fa-circle-question'></i></abbr> ";
        echo "<ul>";
            echo "<p class = 'font-s'>El CFT representa el costo total de un préstamo o servicio financiero, expresado como una tasa anual. A diferencia de la Tasa Nominal Anual (TNA), el CFT incluye todos los costos asociados, como intereses, seguros y gastos administrativos.</p>";
            echo "<p class = 'font-s'>El CFT proporciona una visión completa de los costos reales de un préstamo o servicio financiero y debe ser comparado con otras variables (Referencias), para tomar una adecuada decisión financiera.</p>";
        echo "</ul>";
    echo "</div>";
        
    echo "<script>
    window.onload = function() {
        document.getElementById('resultado3').focus();  // Establece el enfoque en el div cuando la página se cargue
    };
    </script>";
    
    echo "<div class='form__fielset__button'>";
        echo "<input class = 'btn-form' type='submit' name='' value='Volver a Inicio' onclick=\"window.location.href='./index.php';\">";
    echo "</div>";
}


//FUNCION DE CALCULO DE INTERES
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
                    throw new DivisionByZeroError("La derivada es cero, no se puede continuar.");
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
            throw new DivisionByZeroError("La derivada es cero, no se puede continuar.");
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

    <footer class="footer">
        <p>© Copyright | Todos los Derechos Reservados | 2024</p>
    </footer>

    <script src="./js/script.js"></script>
    <script src="https://kit.fontawesome.com/8dd3949086.js" crossorigin="anonymous"></script>



</body>
</html