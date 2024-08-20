<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Calculadora de Costo Financiero Total">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.jpg" type="image/x-icon">
    <link rel="preload" href="./css/styles.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital@0;1&display=swap" rel="stylesheet">
    <link rel="preload" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <title>CuantoPago</title>
</head>

<body>

    <main class="container">

        <div class="container__presentacion">
            <div class="container__contenido">
                <h1 class="container__title no-margin">¿Cuánto Pago?</h1>
                <p>Calculadora de Costo Financiero Total</p>
            </div>

            <div class="container__imagen">
                <img class="logo" src="./img/logo.jpg" alt="Logo">
            </div>
        </div>

        <form class="form__principal" action="" method="get">
            <legend class="form__title">Ingrese datos:</legend>
            <fieldset class="form__fielset">
                <div class="form__fielset__input-checkbox">
                    <label class="campo__label f-size" for="coutas">Si pago en CUOTAS: Tengo Recargo.</label> 
                    <input class="input__radio" type="radio" name="radio1" value="cuotas">
                </div>

                <div class="form__fielset__input-checkbox">
                    <label class="campo__label f-size" for="contado">Si pago de CONTADO: Tengo Descuento. </label> 
                    <input class="input__radio" type="radio" name="radio1" value="contado">
                </div>

                <div class="form__fielset__input-checkbox">
                    <label class="campo__label f-size" for="credito">Obtener un Préstamo</label> 
                    <input class="input__radio" type="radio" name="radio1" value="credito">
                </div>
                
                <div class="form__button">
                    <input type="submit" name="" value="Siguiente" id="boton__calcular">
                </div>
            </fieldset>
        </form>

    </main>

<?php
include 'CurlApi.php';

// if (isset($_GET['cuotas']))
if (isset($_GET['radio1'])) {

if ($_GET['radio1']=="cuotas")///
{?>
    <form class="form" id=""  method="get">
        <fieldset class="form__fielset">
            <div class="form__fielset__input">
                <label class="campo__label" for="">IMPORTE DE CONTADO</label> 
                <input class="campo__field" min = "0" type="number" name="OPCION1" autofocus value="" required >
            </div>

            <div class="form__fielset__input">
                <label class="campo__label" for="">PROMEDIO CUOTA ABONAR </label>
                <input class="campo__field" type="number" name="OPCION2" value="" required>
            </div>

            <div class="form__fielset__input">
                <label class="campo__label" for="">CANTIDAD DE CUOTAS</label>
                <input class="campo__field" type="number" name="OPCION3" value="" required>
            </div>
            <div class="form__fielset__input">
                <input type="submit" name="Subir" value="Calcular" >
            </div>
        </fieldset>
<?php
}}
if (isset($_GET['OPCION1']) && isset($_GET['OPCION2']) && isset($_GET['OPCION3'])){
    $numero1 = $_GET['OPCION1'];
    $numero2 = $_GET['OPCION2'];
    $numero3 = $_GET['OPCION3'];

    $calculo = $numero2*$numero3;
    $interesesTotales = $calculo - $numero1;
    $cft = ($interesesTotales / $numero1) * 100;


    echo "<div class = 'resultado'>";
        echo "<h3>Resultado: </h3>";

        echo "<ul>";
            echo "<li>El valor del producto $ $numero1</li>";
            echo "<li>El valor del producto en cuotas $ $calculo </li>";
            echo "<li>Valor de cada cuota en promedio $ $numero2 </li>";
            echo "<li>Cantidad de cuotas $numero3 </li>";

            echo "<div class='grid'>";
                echo "<li>El costo financiero total es: ". number_format($cft, 2) . "% </li>";

                echo "<abbr title='El CFT representa el costo total de un préstamo o servicio financiero, expresado como una tasa anual. A diferencia de la Tasa Nominal Anual (TNA), el CFT incluye todos los costos asociados, como intereses, seguros y gastos administrativos.
                    El CFT proporciona una visión completa de los costos reales de un préstamo o servicio financiero'><i class='fa-solid fa-circle-info'></i></abbr> ";
            echo "</div>";

            echo "<div class='grid'>";
                echo "<h4>Referencias: </h4>";
                echo "<abbr title='Referencias: El CFT proporciona una visión completa de los costos reales de un préstamo o servicio financiero y debe ser comparado con otras variables, para tomar una adecuada decisión financiera.'><p class= 'flex'>?</p></abbr> ";
            echo "</div>";

            echo "<br>";


            // AGREGAR IF -- SI EL NUMERO DE COSTO FINANCIERO TOTAL ES MAS ALTO QUE LOS NUMEROS DE LA APIS, PINTAR EN ROJO.
            // AGREGAR IF -- SI EL NUMERO DE COSTO FINANCIERO TOTAL ES MAS BAJO QUE LOS NUMEROS DE LA APIS, PINTAR EN VERDE.


            CurlBcra(3);
        echo "</ul>";
    echo "</div>";
}


if (isset($_GET['radio1'])) {
if ($_GET['radio1']=="contado"){

?>
    <form class="form" id=""  method="get">
        <fieldset class="form__fielset">
            <div class="form__fielset__input">
                <label class="campo__label" for="">Importe Financiado</label> 
                <input class="campo__field" type="number" name="DATO1"  value="" required autofocus>
            </div>

            <div class="form__fielset__input">
                <label class="campo__label" for="">Porcentaje de Descuento por Pago Contado</label>
                <input class="campo__field" type="number" name="DATO2" value="" required>
            </div>

            <div class="form__fielset__input">
                <label class="campo__label" for="">Cantidad de Cuotas</label>
                <input class="campo__field" type="number" name="DATO3" value="" required>
            </div>

            <div class="form__fielset__input">
                <input type="submit" name="Subir" value="Calcular">
            </div>
        </fieldset>
    </form>
<?php
}}
if (isset($_GET['DATO1']) && isset($_GET['DATO2'])){

    $precio = $_GET['DATO1'];
    $descuento = $_GET['DATO2'];

    $calculodesc = $precio * ($descuento / 100);
    $perciodescuento = $precio - $calculodesc;

    echo "<div class = 'resultado'>";
        echo "<h3>Resultado: </h3>";
        echo "<ul>";
            echo "<li>Precio original $ $precio </li> ";
            echo "<li>Porcentaje de descuento $descuento % </li>";
            echo "<li>Precio con descuento $ $perciodescuento </li>";
            echo "<br>";

            
            CurlBcra(3);
        echo "</ul>";
    echo "</div>";

}




if (isset($_GET['radio1'])) {   
if ($_GET['radio1']=="credito"){
?>
    <form class="form" id=""  method="get">
        <fieldset class="form__fielset">
            <div class="form__fielset__input">
                <label class="campo__label" for="">Importe del Préstamo Solicitado</label> 
                <input class="campo__field" type="number" name="CREDITO"  value="">
            </div>

            <div class="form__fielset__input">
                <label class="campo__label" for="">CUOTA PROMEDIO ABONAR </label>
                <input class="campo__field" type="number" name="PROMEDIO" value="" required>
            </div>

            <div class="form__fielset__input">
                <label class="campo__label" for="">CANTIDAD DE CUOTAS</label>
                <input class="campo__field" type="number" name="CUOTAS" value="" required>
            </div>
            <div class="form__fielset__input">
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
    
    // Calculamos los intereses totales pagados
    $interesesTotales = $calculo - $numero1;
    
    $cft = ($interesesTotales / $numero1) * 100;
    
    echo "<div class = 'resultado'>";
        echo "<h3>Resultado: </h3>";
        echo "<ul>";
            echo "<li>Monto del credito pedido $ $numero1</li>";
            echo "<li>Valor del monto a devolver $ $calculo</li>";
            echo "<li>Valor de cada couta en promedio $ $numero2</li>";
            echo "<li>Cantidad de cuotas $numero3</li>";
            echo "<li>El costo financiero total es: " . number_format($cft, 2) . "% </li>";
            echo "<i class='fa-solid fa-circle-info'></i>";
            echo "<br>";
            CurlBcra(3);
        echo "</ul>";

    echo "</div>";
}



?>

    <script src="./js/script.js"></script>
    <script src="https://kit.fontawesome.com/8dd3949086.js" crossorigin="anonymous"></script>


</body>
</html>

