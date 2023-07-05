<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

include("../../BD/conec.php");

// Obtener los valores enviados del primer ajax 1 "

$idproyecto = isset($_POST['idProyecto']) ? $_POST['idProyecto'] : 0;
$seleccion = isset($_POST['seleccion']) ? $_POST['seleccion'] : 0;
$Nummodulos = isset($_POST['dato1']) ? $_POST['dato1'] : 0;
$areatotal = isset($_POST['dato2']) ? $_POST['dato2'] : 0;
$Potencia = isset($_POST['dato3']) ? $_POST['dato3'] : 0;

// Obtener los valores enviados del primer ajax 1

$potenciaPico2 = isset($_POST['potenciaPico']) ? $_POST['potenciaPico'] : 0;
$numModulos2 = isset($_POST['numModulos']) ? $_POST['numModulos'] : 0;
$areaTotal2 = isset($_POST['areaTotal']) ? $_POST['areaTotal'] : 0;
$idProyecto2 = isset($_POST['idProyecto2']) ? $_POST['idProyecto2'] : 0; 



// Hacer algo con los datos recibidos
// ...
if($seleccion == "si" ){
    $updateProyecto = "UPDATE proyectos SET PotenciopicoFV='$Potencia', NumerosdeModulos='$Nummodulos', Areatotal='$areatotal' WHERE ID_PROYECTO=$idproyecto";
    $resultado = mysqli_query($conexion, $updateProyecto);
    echo "<script>alert('¡si!');</script>";
}

if($seleccion == "no"){
    $updateProyecto = "UPDATE proyectos SET PotenciopicoFV='$potenciaPico2', NumerosdeModulos='$numModulos2', Areatotal='$areaTotal2' WHERE ID_PROYECTO=$idProyecto2";
    $resultado = mysqli_query($conexion, $updateProyecto);
    echo "<script>alert('¡no!');</script>";
}

?>
