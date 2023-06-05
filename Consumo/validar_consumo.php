

<?php
session_start();


$id_proyecto = $_SESSION['ID_PROYECTO'];

$id_consumo = $_POST['id_consumo'];


// Verificar si se ha almacenado el ID del proyecto en la variable de sesión
if (isset($_SESSION['ID_PROYECTO'])) {
    
    $_SESSION['ID_PROYECTO'] = $id_proyecto;

    $_SESSION['id_consumo'] = $id_consumo;

    header("Location:../Dimencionamiento/Dimencionamiento.php");

    // Realizar las acciones necesarias con el ID del proyecto
    // ...
    // También puedes eliminar la variable de sesión si ya no la necesitas
} else {

    header("Location: consumo.php");

    // La variable de sesión 'ID_PROYECTO' no está definida
    // Manejar el caso en consecuencia
    unset($_SESSION['ID_PROYECTO']);
}
?>