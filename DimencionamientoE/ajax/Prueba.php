<?php

include("../../BD/conec.php");

// Obtener los valores enviados del primer ajax 1 "

$idproyecto = isset($_POST['idProyecto']) ? $_POST['idProyecto'] : 0;
$Nummodulos = isset($_POST['dato1']) ? $_POST['dato1'] : 0;
$areatotal = isset($_POST['dato2']) ? $_POST['dato2'] : 0;
$Potencia = isset($_POST['dato3']) ? $_POST['dato3'] : 0; 
$seleccion = isset($_POST['seleccion']) ? $_POST['seleccion'] : 0; 


$Limitacion = 0; // Valor predeterminado

if (isset($_POST['Limitacion'])) {
    $Limitacion = $_POST['Limitacion'];
    $idproyecto = $_POST['idproyecto'];

    // Hacer algo con los datos recibidos idproyecto

    $updateProyecto = "UPDATE proyectos SET Limitacion='$Limitacion' WHERE ID_PROYECTO=$idproyecto";
    $resultado2 = mysqli_query($conexion, $updateProyecto);

    // Realizar otras acciones si es necesario
} else {
    // No se ha recibido un valor en $_POST['Limitacion']
    // No se realiza ninguna acción adicional
}

// ...
if($seleccion == "si" ){
    $updateProyecto = "UPDATE proyectos SET PotenciopicoFV='$Potencia', NumerosdeModulos='$Nummodulos', Areatotal='$areatotal' WHERE ID_PROYECTO=$idproyecto";
    $resultado = mysqli_query($conexion, $updateProyecto);
    echo "<script>alert('¡si!');</script>";
    return;
}

?>
