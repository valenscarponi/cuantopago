<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Calculadora de Costo Financiero Total">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo-modified.png" type="image/x-icon">
    <link rel="preload" href="./css/styles2.css">
    <link rel="stylesheet" href="./css/styles2.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital@0;1&display=swap" rel="stylesheet">
    <link rel="preload" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <title>Inversión | Calculadora</title>
</head>

<body>

    <main class="container">
        <!-- IMAGEN -->
        
        <div class="container__imagen">
            <img class="logo" src="./img/logo.jpg" alt="Logo">
        </div>

        <!-- TITULO -->

        <div class="container__presentacion">
            <div class="container__contenido">
                <h1 class="container__title no-margin">Inversión</h1>
            </div>
            <div class="container__icono">
                <a href="https://www.instagram.com/cuantopagoapp?igsh=YXBmYnFmeWs2dHhx" target="_blank"><i class="fa-brands fa-instagram" style="color: #0a1828; font-size: 2rem"></i></a>
            </div>
        </div>

        <!-- FORMULARIO DE CHECKBOX -->

        <form class="form__principal" id= "form-principal" action="" method="get">
            <legend class="form__title">Ingrese datos:</legend>
            <fieldset class="form__fielset">
                <div class="form_fielset_input-checkbox">
                    <label class="campo__label f-size" for="TRADICIONAL">Plazo Fijo Tradicional.</label>
                    <input class="input__radio" type="radio" name="radio2" value="TRADICIONAL" id="TRADICIONAL">
                </div>
    
                <div class="form_fielset_input-checkbox">
                    <label class="campo__label f-size" for="BILLETERA">Billeteras Virtuales.</label>
                    <input class="input__radio" type="radio" name="radio2" value="BILLETERA" id="BILLETERA">
                </div>
    
                <div class="form__button">
                    <input class = "btn-form" type="submit" name="" value="Siguiente">
                    <input class = "btn-form" type="submit" name="" value="Volver a Inicio" onclick="enviarFormulario('./index.php')">
                </div>
            </fieldset>
        </form>
    </main>
<?php

// CALCULO FINANCIERO TRADICIONAL

if (isset($_GET['radio2'])) {
    if ($_GET['radio2'] == "TRADICIONAL") { ?>

    <section class="form-secundario">
        <form class="form" id="" method="get">
        <legend class="form__title">Cálculo Financiero Tradicional</legend>
            <fieldset class="form__fielset">
                <div class="form_fielset_input">
                    <label class="campo__label" for="capital1">Capital Inicial a Invertir</label>
                    <input class="campo__field" id = "capital1" type="text" name="capital" autofocus value="" required>
                </div>

                <div class="form_fielset_input">
                    <label class="campo__label" for="plazo1">Plazo (días)</label>
                    <input class="campo__field" id = "plazo1" type="text" name="plazo" value="" required>
                </div>

                <div class="form_fielset_input">
                    <label class="campo__label" for="tna">Tasa Nominal Anual (TNA)</label>
                    <input class="campo__field" id = "tna" type="text" name="tasa" value="" required>
                </div>
                <div class="form_fielset_input-submit">
                    <input type="submit" name="Subir" value="Calcular">
                </div>
            </fieldset>
        </form>

        
        <aside class="iframe">
            <iframe src="https://comparatasas.ar/"></iframe>
        </aside>
    </section>
    <?php
    }
}

if (isset($_GET['capital']) && isset($_GET['plazo']) && isset($_GET['tasa'])) {
    $capital = $_GET['capital'];
    $plazo = $_GET['plazo'];
    $tasa = $_GET['tasa'];

    $calculo = $capital * $tasa * $plazo;
    $calculo1 = 100 * 365;
    $resultado = $calculo / $calculo1;

    // LO QUE MUESTRA POR PANTALLA
    echo "<div class = 'resultado'>";
        echo "<h3>Datos de la Operación: </h3>";
        echo "<ul>";
            echo "<li>Capital Inicial a Invertir: $". number_format($capital, 2, ',','.') . "</li>";
            echo "<li>Plazo (Días):  $plazo </li>";
            echo "<li>Tasa Nominal Anual (TNA):  $tasa % </li>";
            echo "<li>Intereses Generados: $" . number_format($resultado, 2, ',','.').  "</li>";
        echo "</ul>";
    echo "</div>";

    echo "<script>
        window.onload = function() {
            var resultadoDiv = document.querySelector('.resultado');  // Selecciona el primer div con la clase 'resultado'
            resultadoDiv.scrollIntoView({ behavior: 'smooth' });  // Hace scroll hacia el div cuando la página se carga
        };
    </script>";

    echo "<div class='form__button'>";
        echo "<input class = 'btn-form' type='submit' name='' value='Volver a Inicio' onclick=\"window.location.href='./index.php';\">";
    echo "</div>";

}


// BILLETERA VIRTUAL


if (isset($_GET['radio2'])) {
    if ($_GET['radio2'] == "BILLETERA") { ?>
    
    <section class="form-secundario">

        <form class="form" id="" method="get">
        <legend class="form__title">Billetera Virtual</legend>
            <fieldset class="form__fielset">
                <div class="form_fielset_input">
                    <label class="campo__label" for="capital">Capital Inicial a Invertir</label>
                    <input class="campo__field" id = "capital" type="text" name="capital1" autofocus value="" required>
                </div>
                
                <div class="form_fielset_input">
                    <label class="campo__label" for="plazo">Plazo (días) </label>
                    <input class="campo__field" id = "plazo" type="text" name="plazo1" value="" required>
                </div>

                <div class="form_fielset_input">
                    <label class="campo__label" for="tea">Tasa Efectiva Anual (TEA)</label>
                    <input class="campo__field" id = "tea"type="text" name="tasa1" value="" required>
                </div>
                <div class="form_fielset_input-submit">
                    <input type="submit" name="Subir" value="Calcular">
                </div>
            </fieldset>
        </form>
        
        <aside class="iframe">
            <iframe src="https://comparatasas.ar/"></iframe>
        </aside>
        
    </section>
        


    <?php
    }
}

if (isset($_GET['capital1']) && isset($_GET['plazo1']) && isset($_GET['tasa1'])) {
    $capital = $_GET['capital1'];
    $plazo = $_GET['plazo1'];
    $tasa = $_GET['tasa1'];

    $tiempo = $plazo / 365;
    $decimal = $tasa / 100;


    $calculo = pow(1 + $decimal, $tiempo);
    $calculo2 = $capital * $calculo - $capital;


    // LO QUE MUESTRA POR PANTALLA
    echo "<div class = 'resultado'>";
        echo "<h3>Datos de la Operación: </h3>";
        echo "<ul>";
            echo "<li>Capital Inicial a Invertir: $". number_format($capital, 2, ',','.') ."</li>";
            echo "<li>Plazo (Días):  $plazo </li>";
            echo "<li>Tasa Efectiva Anual (TEA):  $tasa  % </li>";
            echo "<li>Intereses Generados: $" . number_format($calculo2, 2, ',','.'). "</li>";
        echo "</ul>";
    echo "</div>";

    echo "<script>
        window.onload = function() {
            var resultadoDiv = document.querySelector('.resultado');  // Selecciona el primer div con la clase 'resultado'
            resultadoDiv.scrollIntoView({ behavior: 'smooth' });  // Hace scroll hacia el div cuando la página se carga
        };
    </script>";

    echo "<div class='form__button'>";
        echo "<input class = 'btn-form' type='submit' name='' value='Volver a Inicio' onclick=\"window.location.href='./index.php';\">";
    echo "</div>";
    
    

}

?>

    <footer class="footer">
        <p>© Copyright | Todos los derechos reservados 2024</p>
    </footer>

    <script src="./js/script.js"></script>
    <script src="https://kit.fontawesome.com/8dd3949086.js" crossorigin="anonymous"></script>

</body>
</html>