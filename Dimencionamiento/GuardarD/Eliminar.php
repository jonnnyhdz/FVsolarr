<?php
include('../../BD/conec.php');

$id= $_GET['ID_ESCOGIDO'];

//$eliminarProducto = "DELETE FROM producto WHERE codigo = '$codigoProducto'";
$EliminarProducto ="DELETE  FROM escogido_mfv WHERE ID_ESCOGIDO = '$id'";

$resultado=mysqli_query($conexion,$EliminarProducto);


header('Location: ../Dimencionamiento.php');


?>