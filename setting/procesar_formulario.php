<?php

include("../BD/conec.php");

$foto = $_FILES['imagen']['tmp_name']; // Obtén la ubicación temporal del archivo subido

// Lee el contenido del archivo
$contenidoFoto = file_get_contents($foto);

// Escapa el contenido de la foto para evitar problemas con caracteres especiales
$contenidoFoto = mysqli_real_escape_string($conexion, $contenidoFoto);

$idUsuario = 1; // ID del usuario a actualizar

$query = "UPDATE usuarios SET imagen = '$contenidoFoto' WHERE id = $idUsuario";
mysqli_query($conexion, $query);

header('Location: setting.php');


?>