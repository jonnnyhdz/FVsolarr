<?php

include('../../BD/conec.php');

$id_proyecto = $_GET['ID_PROYECTO'];

// BORRAR FACTURAS //
$eliminarFacturas = "DELETE FROM facturas WHERE id_proyecto = '$id_proyecto'";
$resultadoFacturas = mysqli_query($conexion, $eliminarFacturas);

if (!$resultadoFacturas) {
    echo "Error al eliminar las facturas: " . mysqli_error($conexion);
}

// BORRAR INVERSORES //
$eliminarInversores = "DELETE FROM escogido_mfv WHERE ID_PROYECTO = '$id_proyecto'";
$resultadoInversores = mysqli_query($conexion, $eliminarInversores);

if (!$resultadoInversores) {
    echo "Error al eliminar los inversores: " . mysqli_error($conexion);
}

// BORRAR PROYECTO //
$eliminarProyecto = "DELETE FROM proyectos WHERE ID_PROYECTO = '$id_proyecto'";
$resultadoProyecto = mysqli_query($conexion, $eliminarProyecto);

if (!$resultadoProyecto) {
    echo "Error al eliminar el proyecto: " . mysqli_error($conexion);
}

header('Location: ../Proyecto.php');

?>
