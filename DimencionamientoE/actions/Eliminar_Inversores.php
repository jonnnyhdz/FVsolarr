<?php 

include('../../BD/conec.php');

$id = $_GET['id_inversor'];

$EliminarProducto = "DELETE FROM escogido_mfv WHERE ID_ESCOGIDO = '$id'";
$resultado = mysqli_query($conexion, $EliminarProducto);

if ($resultado) {
    // La consulta de eliminación se ejecutó correctamente
    header('Location: ../Inversores.php'); // Redireccionar a otra_pagina.php
    exit(); // Finalizar la ejecución del script actual
} else {
    // La consulta de eliminación falló
    echo 'error';
}


?>