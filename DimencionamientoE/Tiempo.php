<?php
include("../BD/conec.php");

$id_seleccionado = isset($_POST["id"]) ? $_POST["id"] : 1;
$id_proyecto = $_POST["id_proyecto"];

//CONSULTAR
$resultados = mysqli_query($conexion, "SELECT * FROM ModulosFV WHERE ID_MFV = '$id_seleccionado'");
while ($consulta = mysqli_fetch_array($resultados)) {

    $valor1 = isset($_POST["valor1"]) ? $_POST["valor1"] : 0;
    $valor2 = isset($_POST["valor2"]) ? $_POST["valor2"] : 0;

    $Area_módulo = $consulta['Area_módulo'];
    $Vmpp =  $consulta['Vmpp'];
    $TepMax =  $consulta['Temperature_Coefficient_Pmax'];
    $TepVoc =  $consulta['Temperature_Coefficient_Voc'];
    $OpenC =  $consulta['Circuit_Voltage_Voc'];
    $CalculoVmpp = $Vmpp + (($valor2 + 30 - 25) * (($TepMax / 100) * $Vmpp));
    $CalculoVoc = $OpenC + (($valor1 - 25) * (($TepVoc / 100) * $OpenC));


}
$updateProyecto = "UPDATE proyectos SET TEMP_MIN='$valor1',TEMP_MAX='$valor2',VMPMIN='$CalculoVmpp',VOCMAX='$CalculoVoc'WHERE ID_PROYECTO='$id_proyecto'";
$resultado = mysqli_query($conexion, $updateProyecto);

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
    <p class="espacios" for="descripcion"> <strong> Vmp <sub>min</sub> : </strong><span style="color: red;"> <?php echo $CalculoVmpp; ?> v </span></p>
    <p class="espacios" for="descripcion"> <strong> VOC <sub>max</sub> : </strong><span style="color: red;"> <?php echo $CalculoVoc; ?> v </span></p>
</body>

</html>