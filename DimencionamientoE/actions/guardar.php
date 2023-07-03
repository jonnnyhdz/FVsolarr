<?php
// Conectamos a la base de datos
include('../../BD/conec.php');

session_start();


$id_usuario = $_SESSION['id_usuario'];

$cantidad_inversores = $_POST['cantidad_inversores'];

$ID_PROYECTO = $_SESSION['ID_PROYECTO'];

// Si se seleccionó "Los mismos" en el primer select, asignar la cantidad ingresada a todas las opciones de marca/modelo
if ($_POST['inversores'] == 'mismo') {

    $cantidad_inversores = 1; // asignar 1 a cantidad_inversores si se seleccionó "mismo"
    $ID_PROYECTO = $_SESSION['ID_PROYECTO'];
}

// Crear un array para almacenar las opciones de marca/modelo sin duplicados
$marcas = array();

for ($i = 1; $i <= $cantidad_inversores; $i++) {
    $marca_modelo = $_POST['marca_'.$i];
    $cantidad = $_POST['cantidad_'.$i];
    
    // Agregar la opción de marca/modelo al array
    $marcas[$marca_modelo] = $cantidad;
}

// Crear la cadena SQL para insertar los datos en la base de datos
$sql = '';
foreach ($marcas as $marca => $cantidad) {
    $sql .= "('$ID_PROYECTO','$marca','$cantidad'),";
}
$sql = rtrim($sql, ','); // Eliminar la coma final de la cadena SQL...

$consulta = "INSERT INTO escogido_mfv (ID_PROYECTO,ID_INVERSORES, cantidad) VALUES $sql";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    echo "Los datos se guardaron correctamente.";
    header("Location: ../Dimencionamiento.php?ID_PROYECTO='$ID_PROYECTO'");
} else {
    echo "Error al guardar los datos: " . mysqli_error($conexion);
    header("Location: ../Dimencionamiento.php");
    
}

?>