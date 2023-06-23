<?php
include("../BD/conec.php");
$id_proyecto = $_POST["id_proyecto"];
$id_seleccionado = isset($_POST["id"]) ? $_POST["id"] : 0;
$HSP = isset($_POST["HSP"]) ? $_POST["HSP"] : 0;
$nombreP = isset($_POST["pro"]) ? $_POST["pro"] : 0;
$ubi = isset($_POST["ubi"]) ? $_POST["ubi"] : 0;

$factorPerdida = 0.77;

//CONSULTAR
$resultados = mysqli_query($conexion, "SELECT * FROM ModulosFV WHERE ID_MFV = '$id_seleccionado'");
while ($consulta = mysqli_fetch_array($resultados)) {

    $Area_módulo = $consulta['Area_módulo'];
    $Vmpp =  $consulta['Vmpp'];
    $TepMax =  $consulta['Temperature_Coefficient_Pmax'];
    $TepVoc =  $consulta['Temperature_Coefficient_Voc'];
    $OpenC =  $consulta['Circuit_Voltage_Voc'];
    $WATT =  $consulta['Watts'];

    $EnergiaTotal = 0;

    $resultados = mysqli_query($conexion, "SELECT * FROM facturas WHERE Id_proyecto = '$id_proyecto'");
    while ($consulta = mysqli_fetch_array($resultados)) {
        

        $EnergiaTotal = $consulta['kwh'] + $EnergiaTotal;
    }

    /* calculos */
    $energiarequerida = $EnergiaTotal / 365;
    $potenciapico = $HSP * $factorPerdida;
    $potenciapicoFV = $energiarequerida / $potenciapico;
    $Potenciapanel = $WATT / 1000;
    $NMAXMFV = $potenciapicoFV  / $Potenciapanel;
    $RedondeoNMAXMFV = intval($NMAXMFV);
    $areatotal = $Area_módulo * $RedondeoNMAXMFV;

    /* redondeos */
}

$Renergiarequerida = round($energiarequerida, 2);
$RpotenciapicoFV = round($potenciapicoFV, 2);
$updateProyecto2 = "UPDATE proyectos SET ID_MFV='$id_seleccionado',HSP='$HSP', NOMBRE_PROYECTO='$nombreP',Energiarequerida='$Renergiarequerida',PotenciopicoFV='$RpotenciapicoFV',Areatotal='$areatotal',NumerosdeModulos='$RedondeoNMAXMFV', Ubicacion='$ubi' WHERE ID_PROYECTO='$id_proyecto'";
$resultado = mysqli_query($conexion, $updateProyecto2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="">
        <p class="espacios" for="descripcion"> <strong>Area por modulo:</strong> <span style="color: red;"> <?php echo $Area_módulo; ?> m&sup2</span></p>
    </div>
    <div class="">
        <p class="espacios" for="descripcion"> <strong> Energia requerida:</strong><span style="color: red;"> <?php echo $Renergiarequerida; ?> Kwh dia</span></p>
        <p class="espacios" for="descripcion"> <strong> Potencia pico FV:</strong><span style="color: red;"> <?php echo $RpotenciapicoFV; ?> Kwh</span></p>
        <p class="espacios" for="descripcion"> <strong> Numeros de Modulos del proyecto:</strong> <span style="color: red;"> <?php echo $RedondeoNMAXMFV; ?> Modulos</span></p>
        <p class="espacios" for="descripcion"> <strong> Area Total:</strong> <span style="color: red;"> <?php echo $areatotal; ?> m&sup2</span></p>
    </div>
</body>
</html>