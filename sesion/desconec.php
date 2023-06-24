<?php

session_start(); 
session_destroy();

// Redirige a otra página
header("Location: ../index.php");
exit;
?>