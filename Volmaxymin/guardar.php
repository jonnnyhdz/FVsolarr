<?php 

include("../BD/conec.php");


$id_proyecto = isset($_POST["id"]) ? $_POST["id"] : 0;

$nummodulos = isset($_POST["nummodulos"]) ? $_POST["nummodulos"] : 0;

$cancadenas = isset($_POST["cancadenas"]) ? $_POST["cancadenas"] : 0;

$area = isset($_POST["area"]) ? $_POST["area"] : 0; 

$opcionSeleccionada = isset($_POST["opcionSeleccionada"]) ? $_POST["opcionSeleccionada"] : 0; 


$updateProyecto2 = "UPDATE proyectos SET CmodulosVolt='$nummodulos', CcadenasVolt='$cancadenas', areadisponible='$area',opcionSeleccionada='$opcionSeleccionada' WHERE id_proyecto = $id_proyecto";
$resultado = mysqli_query($conexion, $updateProyecto2);


?>