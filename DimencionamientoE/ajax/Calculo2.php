<?php

include("../../BD/conec.php");


$id_proyecto = $_POST["id_proyecto"];
$id_seleccionado = isset($_POST["id"]) ? $_POST["id"] : 0;
$HSP = isset($_POST["HSP"]) ? $_POST["HSP"] : 2;
$nombreP = isset($_POST["pro"]) ? $_POST["pro"] : 0;
$ubi = isset($_POST["ubi"]) ? $_POST["ubi"] : 0;

$factorPerdida = 0.77;
$factorPerdida = floatval($factorPerdida);

//CONSULTAR
$resultados = mysqli_query($conexion, "SELECT * FROM ModulosFV WHERE ID_MFV = '$id_seleccionado'");
while ($consulta = mysqli_fetch_array($resultados)) {


    /* aqui empieza los errores  */
    $Area_módulo = $consulta['Area_módulo'];
    $Vmpp =  $consulta['Vmpp'];
    $TepMax =  $consulta['Temperature_Coefficient_Pmax'];
    $TepVoc =  $consulta['Temperature_Coefficient_Voc'];
    $OpenC =  $consulta['Circuit_Voltage_Voc'];
    $WATT =  $consulta['Watts'];
    /* Convertir en float  */

    $EnergiaTotal = 0;

    $resultados = mysqli_query($conexion, "SELECT * FROM facturas WHERE Id_proyecto = '$id_proyecto'");
    while ($consulta = mysqli_fetch_array($resultados)) {
        $EnergiaTotal = $consulta['kwh'] + $EnergiaTotal;
    }

    if ($HSP == 0) {
    } else {
        /* calculos */
        $energiarequerida = $EnergiaTotal / 365;
        $potenciapico = $HSP * $factorPerdida;
        $potenciapicoFV = $energiarequerida / $potenciapico;
        $Potenciapanel = $WATT / 1000;
        $NMAXMFV = $potenciapicoFV  / $Potenciapanel;
        $RedondeoNMAXMFV = intval($NMAXMFV);
        $areatotal = $Area_módulo * $RedondeoNMAXMFV;

        $Renergiarequerida = round($energiarequerida, 2);
        $RpotenciapicoFV = round($potenciapicoFV, 2);
        $updateProyecto2 = "UPDATE proyectos SET ID_MFV='$id_seleccionado',HSP='$HSP', NOMBRE_PROYECTO='$nombreP',Energiarequerida='$Renergiarequerida',Ubicacion='$ubi' WHERE ID_PROYECTO='$id_proyecto'";
        $resultado = mysqli_query($conexion, $updateProyecto2);
    }
}

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
    <?php if ($HSP == 0 || $HSP == NULL) { ?>
        <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
            <span class="badge badge-pill badge-warning">Alert</span>
            Inserta datos que sean correctos!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } else { ?>
        <div class="datosFormulario">
            <div class="espacios">
                <label for="inputEnergiaRequerida"><strong>Energia requerida:</strong></label>
                <span style="color: red;"><?php echo $Renergiarequerida; ?> Kwh dia</span>
            </div>
            <div class="espacios">
                <label for="inputPotenciaPico"><strong>Potencia pico FV:</strong></label>
                <span style="color: red;"><?php echo $RpotenciapicoFV; ?> Kwh</span>
                <input type="hidden" id="inputPotenciaPico" name="inputPotenciaPico" value="<?php echo $potenciapicoFV; ?>">
            </div>
            <div class="espacios">
                <label for="inputNumModulos"><strong>Numeros de Modulos del proyecto:</strong></label>
                <br>
                <span style="color: red;"><?php echo $RedondeoNMAXMFV; ?> Modulos</span>
                <input type="hidden" id="inputNumModulos" name="inputNumModulos" value="<?php echo $NMAXMFV; ?>">
            </div>
            <div class="espacios">
                <label for="inputAreaTotal"><strong>Area Total:</strong></label>
                <span style="color: red;"><?php echo $areatotal; ?> m&sup2</span>
                <input type="hidden" id="inputAreaTotal" name="inputAreaTotal" value="<?php echo $areatotal; ?>">
            </div>
            <input type="hidden" id="idProyecto" name="idProyecto" value="<?php echo $id_proyecto; ?>">
        </div>
        <?php $consultalimitar = "SELECT * FROM proyectos WHERE ID_PROYECTO='$id_proyecto'";
        $Limitar = mysqli_query($conexion, $consultalimitar);

        if ($Limitar) {
            $proyecto = mysqli_fetch_assoc($Limitar);
            if ($proyecto['Limitacion'] == "no") {
                $updateProyecto = "UPDATE proyectos SET PotenciopicoFV='$RpotenciapicoFV', NumerosdeModulos='$RedondeoNMAXMFV', Areatotal='$areatotal' WHERE ID_PROYECTO='$id_proyecto'";
                $resultado = mysqli_query($conexion, $updateProyecto);
            }
        } ?>
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>