<?php
// Conexión a la base de datos
$host = "localhost";
$usuario = "root";
$contraseña = "root";
$base_de_datos = "ULSOLAR2";

$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

if (!$conexion) {
	die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}
?>