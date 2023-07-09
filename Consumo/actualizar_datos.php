<?php
include("../BD/conec.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados desde el formulario
    $ids = $_POST['id'];
    $kwhs = $_POST['kwh'];
    $kws = $_POST['kw'];
    $fps = $_POST['fp'];

    // Iterar sobre los datos y actualizar la base de datos
    for ($i = 0; $i < count($ids); $i++) {
        $id = $ids[$i];
        $kwh = $kwhs[$i];
        $kw = $kws[$i];
        $fp = $fps[$i];

        // Aquí debes construir tu consulta SQL para actualizar los datos en la base de datos
        // Puedes utilizar la variable $conexion que se incluye desde "../BD/conec.php"
        // y las variables $id, $fecha, $fecha2, $kwh, $kw, $fp para construir tu consulta

        // Ejemplo de consulta:
        $consulta = "UPDATE facturas SET kwh = '$kwh', kw = '$kw', fp = '$fp' WHERE id = '$id'";
        mysqli_query($conexion, $consulta);
    }

    // Redirigir o mostrar un mensaje de éxito después de actualizar los datos
    // Puedes redirigir a otra página o mostrar un mensaje en esta misma página
    // Por ejemplo, redirigir a una página de confirmación:
    header("Location: vistaC.php");
    exit();
}
?>
