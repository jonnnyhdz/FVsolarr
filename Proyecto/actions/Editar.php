<?php 

include('../../BD/conec.php');

$id_proyecto = $_GET['ID_PROYECTO'];

$nomproyecto = $_POST['nombreProyecto'];

// BORRAR FACTURAS //
$updatename = "UPDATE proyectos SET NOMBRE_PROYECTO='$nomproyecto' WHERE ID_PROYECTO='$id_proyecto'";
$resultado = mysqli_query($conexion, $updatename);


if ($resultado) {
    // La consulta de actualización se ejecutó correctamente
    header("Location: ../Proyecto.php"); // Redireccionar a otra_pagina.php
    exit(); // Finalizar la ejecución del script actual
  } else {
    // La consulta de actualización falló
    header("Location: ../Proyecto.php"); 
  }
?>