<?php
include("../../BD/conec.php");

$numModulos = $_POST['numModulos'];
$areaTotal = $_POST['areaTotal'];
$potenciaPico = $_POST['potenciaPico'];
$idProyecto = $_POST['idProyecto'];

$updateProyecto3 = "UPDATE proyectos SET PotenciopicoFV='$potenciaPico', NumerosdeModulos='$numModulos', Areatotal='$areaTotal' WHERE ID_PROYECTO='$idProyecto'";
$resultado3 = mysqli_query($conexion, $updateProyecto3);

// ...
?>

