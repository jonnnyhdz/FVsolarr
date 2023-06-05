<?php
include("../BD/conec.php");

if(isset($_POST['id_consumo'])) {
    $id_consumo = $_POST['id_consumo'];
    





    
}
?>



<?php
include("../BD/conec.php");

if (isset($_POST['eliminar_id'])) {
    $id_consumo = $_POST['eliminar_id'];

    // Agrega el código para eliminar el registro de la base de datos
    $query = "DELETE FROM facturas WHERE no_servicio = '$id_consumo'";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
        // Eliminación exitosa, muestra un mensaje o realiza otras acciones si es necesario
        echo "Registro eliminado correctamente";
        header("Location: ../Consumo/Consumo.php");
    } else {
        // Ocurrió un error durante la eliminación, muestra un mensaje de error o realiza otras acciones si es necesario
        echo "Error al eliminar el registro";
    }
}
?>
