<?php

include("../../BD/conec.php");

session_start();

$id_proyecto = $_SESSION['ID_PROYECTO'];

$consulta = "SELECT activo_consumo FROM proyectos WHERE ID_PROYECTO = '$id_proyecto'";
$resultado = mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_assoc($resultado);
$activo_consumo = $fila['activo_consumo'];

if (isset($_SESSION['ID_PROYECTO'])) {
    
    $_SESSION['ID_PROYECTO'] = $id_proyecto;
    $_alert=1;
    $_SESSION['_alert'] = $_alert;

    if ($activo_consumo == 1) {
        
        $_SESSION['_alert'] = null;
        header("Location: ../../Consumo/VistaC.php");
        exit(); // Se recomienda usar exit() después de redireccionar
    } else {
        header("Location: ../../Consumo/consumo.php");
    }
} else {
    header("Location: ../Proyecto.php");
}
?>