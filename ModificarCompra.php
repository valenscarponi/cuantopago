<?php 
include("MasterPage.php");
if (!isset($_SESSION['idUsuario'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header("Location: Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <?php
   
if (isset($_POST['modificar']))
    {
        
        $idcomprobante = $_POST['idcomp'];
        $comprobante =$_POST['comprobante'];
        $idContribuyente = $_POST['idcont'];
        $tipocomprobante =$_POST['tipocomprobante'];
        $numero =$_POST['numero'];
        $fecha =$_POST['fecha'];
       
        $neto21 =$_POST['neto21'];
        $neto10_5 =$_POST['neto10_5'];
        $neto27 =$_POST['neto27'];
        $iva21 =$_POST['iva21'];
        $iva10_5 =$_POST['iva10_5'];
        $iva27 =$_POST['iva27'];
        $exento =$_POST['exento'];
        $nogravado =$_POST['nogravado'];
        $impuestos =$_POST['impuestos'];
        $percepciones =$_POST['percepciones'];
        $retenciones =$_POST['retenciones'];
        $gastos =$_POST['gastos'];
        $total = $_POST['total'];

        $periodo =$_POST['periodo'];
        $signo =$_POST['signo'];
        $idusuario = $_SESSION["idUsuario"];
        
        if($comprobante == "NC")
            $signo = -1;
        else {
            $signo = 1;
        }
        //Manejamos que el total no sea nulo o cero
        if($_POST['total'] == null )
        {
            
            echo "<script>alert('El campo de Total no puede estar vacío')
            location.href = 'ModificarCompra.php?id=".$idcomprobante."';
            </script>";
            exit();
        }
        elseif ($_POST['total'] == 0) 
        {
            
            echo "<script>alert('El Total no puede ser cero')
            location.href = 'ModificarCompra.php?id=".$idcomprobante."';
            </script>";
            exit();
        }
        else
        {
            $total =$_POST['total'];
        }

        $sql = "UPDATE compras SET Comprobante = '".$comprobante."',Tipo_Comprobante = '".$tipocomprobante."',Numero = '".$numero."',
        Fecha = '".$fecha."',Id_Contribuyente = '".$idContribuyente."',Neto_21 = '".$neto21."',Neto_10_5 = '".$neto10_5."',Neto_27 = '".$neto27."',
        Iva_21 = '".$iva21."',Iva_10_5 = '".$iva10_5."',Iva_27 ='".$iva27."',Exento = '".$exento."',No_Gravado = '".$nogravado."',
        Impuestos = '".$impuestos."' ,Percepciones ='".$percepciones."' ,Retenciones = ' ".$retenciones."',Gastos = ' ".$gastos."',
        Total = '".$total."',Periodo = '".$periodo."',Signo = '".$signo."',id_usuario = '".$idusuario."' WHERE Id = '".$idcomprobante."'";
        
        $resultado = mysqli_query($conexion, $sql);
        if ($resultado) 
        {
            echo "<script>alert('Modificado exitosamente')
            location.href = 'Compras.php';
            </script>";
        }else{
            echo "<script> alert('La accion no se pudo completar')
            location.href = 'Compras.php';
            </script>";
        }
        
        mysqli_close($conexion);
    }
    else
    {
        if(isset($_GET['Id']))
        {
            $idcomprobante = $_GET['Id'];
        }
        elseif(isset($_GET['id']))
        {
            
            $idcomprobante = $_GET['id'];
        }
        $sql = $conexion->query("SELECT Id,Comprobante,Tipo_Comprobante,Numero,Fecha,Id_Contribuyente,Neto_21,Neto_10_5,Neto_27,
        Iva_21,Iva_10_5,Iva_27,Exento,No_Gravado,Impuestos,Percepciones,Retenciones,Gastos,Total,Periodo,Signo,
        id_usuario FROM compras WHERE Id = '$idcomprobante'");
      
       while ($fila=$sql->fetch_assoc()) 
       {
        $idcomprobante = $fila['Id'];
        $idContribuyente = $fila['Id_Contribuyente'];
        $comprobante =$fila['Comprobante'];
        $tipocomprobante =$fila['Tipo_Comprobante'];
        $numero =$fila['Numero'];
        $fecha =$fila['Fecha'];
        $neto21 =$fila['Neto_21'];
        $neto10_5 =$fila['Neto_10_5'];
        $neto27 =$fila['Neto_27'];
        $iva21 =$fila['Iva_21'];
        $iva10_5 =$fila['Iva_10_5'];
        $iva27 =$fila['Iva_27'];
        $exento =$fila['Exento'];
        $nogravado =$fila['No_Gravado'];
        $impuestos =$fila['Impuestos'];
        $percepciones =$fila['Percepciones'];
        $retenciones =$fila['Retenciones'];
        $gastos =$fila['Gastos'];
        $total =$fila['Total'];
        $periodo =$fila['Periodo'];
        $signo =$fila['Signo'];
        $idusuario = $fila["id_usuario"];

        if($comprobante == "NC")
            $signo = -1;
        else {
            $signo = 1;
        }
       }

       $sql2 = $conexion->query("SELECT Id, Ape_Nom, Cuit FROM contribuyentes WHERE Id = '$idContribuyente'");
       while($fila2 = $sql2->fetch_assoc())
       {
           $aprenomcont = $fila2['Ape_Nom'];
           
           $cuit = $fila2['Cuit'];
       }
    }

    ?>
    <div class="container">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" onsubmit="return validarTotal()">
        <input type="hidden" value="<?php echo $idContribuyente; ?>" name="idcont">
        <input type="hidden" value="<?php echo $idcomprobante; ?>" name="idcomp">
        <div class="card">
            <div class="card-header bg-success">
                <h2 class="text-white">Modificar compra</h2>
                <div class="row">
                    <div class="col text-white">
                        <h4>Contribuyente: <?php echo($aprenomcont);?></h4>
                    </div>
                    <div class="col text-white">
                        <h4>CUIT del Contribuyente: <?php echo($cuit);?></h4>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="comprobante">Comprobante</label>
                            <select class="form-select" name="comprobante">
                            <option class="bg-secondary text-white" value="<?php echo $comprobante;?>">
                            <?php if($comprobante == "FC"){
                                ?>Factura<?php
                            }elseif($comprobante == "RC"){
                                ?>Recibo<?php
                            }elseif($comprobante == "ND"){
                                ?>Nota de débito<?php
                            }elseif($comprobante == "NC"){
                                ?>Nota de crédito<?php
                                }?>

                            </option>
                                <option value="FC">Factura</option>
                                <option value="RC">Recibo</option>
                                <option value="ND">Nota de débito</option>
                                <option value="NC">Nota de crédito</option>
                                <!-- FC factura - NT nota de debito - RC recibo - NC nota credito -  -->
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="tipocomprobante">Tipo Comprobante</label>
                            <select class="form-select" name="tipocomprobante">
                                <option class="bg-secondary text-white" value="<?php echo $tipocomprobante;?>">
                                <?php if($tipocomprobante == "A"){
                                    ?>A<?php
                                }elseif($tipocomprobante == "B"){
                                    ?>B<?php
                                }elseif($tipocomprobante == "C"){
                                    ?>C<?php
                                }?>

                                </option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <!-- A, B, O C -->
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="numero">Numero</label>
                            <input class="form-control" value="<?php echo $numero; ?>" name="numero" id="numero" required>
                            <!--  00/63726473 -->
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="fecha">Fecha</label>
                            <input class="form-control"value="<?php echo $fecha; ?>" type="date" name="fecha" required>
                        </div>
                    </div>
                </div>

                <!-- netos -->

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="neto21">Neto 21</label>
                            <input class="form-control" value="<?php echo $neto21; ?>" type="number" step="0.01" onchange="sumar()" name="neto21" id="neto21" pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="neto10-5">Neto 10,5</label>
                            <input class="form-control" value="<?php echo $neto10_5; ?>" type="number" step="0.01" name="neto10_5" onchange="sumar()" id="neto10_5" pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="neto27">Neto 27</label>
                            <input class="form-control" value="<?php echo $neto27; ?>" type="number" step="0.01" name="neto27" onchange="sumar()" id="neto27" pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="iva21">Iva 21</label>
                            <input class="form-control" value="<?php echo $iva21; ?>" type="number" step="0.01" name="iva21" id="iva21" pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="iva10-5">Iva_10,5</label>
                            <input class="form-control" value="<?php echo $iva10_5; ?>" type="number" step="0.01" name="iva10-5" id="iva10_5"  pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="iva27">Iva_27</label>
                            <input class="form-control" value="<?php echo $iva27; ?>" type="number" step="0.01" name="iva27" id="iva27" pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="exento">Exento</label>
                            <input class="form-control" value="<?php echo $exento; ?>" type="number" step="0.01" name="exento" onchange="sumar()"  id="exento" pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="nogravado">No Gravado</label>
                            <input class="form-control" value="<?php echo $nogravado; ?>" type="number" step="0.01" name="nogravado" onchange="sumar()" id="nogravado" pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="impuestos">Impuestos</label>
                            <input class="form-control" value="<?php echo $impuestos; ?>" type="number" step="0.01" name="impuestos" onchange="sumar()" id="impuestos" pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="percepciones">Percepciones</label>
                            <input class="form-control" value="<?php echo $percepciones; ?>" type="number" step="0.01" name="percepciones" onchange="sumar()" id="percepciones" pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="retenciones">Retenciones</label>
                            <input class="form-control" value="<?php echo $retenciones; ?>" type="number" step="0.01" name="retenciones" onchange="sumar()" id="retenciones" pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="gastos">Gastos</label>
                            <input class="form-control" value="<?php echo $gastos; ?>" type="number" step="0.01" name="gastos" onchange="sumar()" id="gastos" pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="total">Total</label>
                            <input class="form-control" value="<?php echo $total; ?>" type="number" step="0.01" name="total" id="total" pattern="^\d*(\.\d{0,2})?$">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="periodo">Periodo</label>
                            <!-- MES Y AÑO -->
                            <input class="form-control" value="<?php echo $periodo; ?>" type="int" name="periodo" required>
                            
                           
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <!-- NO SE MUESTRA  -->
                            <input class="form-control" type="hidden"  name="signo">
                            <?php
                             
                            ?>
                            <!-- 1 SI ES FC
                            1 SI ES RC
                            1 SI ES ND
                            -1 SI ES NC -->
                            
                            <!-- NO SE MUESTRA  -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class=" btn btn-success" name="modificar" type="submit">Modificar</button>
                        <a class=" btn btn-success" href="Compras.php" name="modificar" type="submit">Volver</a>
                    </div>
                </div>
                
            </div>
        </div>

    </form>
    </div>

</body>
</html>