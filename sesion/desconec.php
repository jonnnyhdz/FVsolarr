<?php
session_start(); // Inicia la sesión

// ... código adicional ...

// Cierra la sesión
session_destroy();

// Redirige a otra página
header("Location: ../index.php");
exit;
?>