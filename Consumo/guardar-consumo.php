<?php
include "../BD/conec.php";


session_start();


$idproyecto = $_SESSION['ID_PROYECTO'];
$_SESSION['ID_PROYECTO'] = $idproyecto;


var_dump($idproyecto);

// Obtener los datos del formulario
$numeroServicio = $_POST['numeroServicio'];
$fechaFacturacion = new DateTime($_POST['fechaFacturacion']); // Convertir a objeto DateTime
$tipoTarifa = $_POST['tipoTarifa'];
$tipoServicio = $_POST['tipoServicio'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO facturas (no_servicio, fecha_facturacion, mes, mes2, kwh, kw, fp,Id_proyecto) VALUES ";

if ($tipoTarifa === "mensual") {
    for ($i = 0; $i < 12; $i++) {
        $mesActual = getMonthName($fechaFacturacion->format('n') - 1) . ' ' . $fechaFacturacion->format('Y');
        $fechaTexto = $mesActual;
        $fechaFacturacion->modify('-1 month');

        $kwh = $_POST['kwh'][$i];
        $kw = '';
        $fp = '';

        if (
            $tipoServicio === "PDBT" ||
            $tipoServicio === "GDBT" ||
            $tipoServicio === "RABT" ||
            $tipoServicio === "GDMTO" ||
            $tipoServicio === "GDMTH" ||
            $tipoServicio === "RAMT"
        ) {
            $kw = $_POST['kw'][$i];
            $fp = $_POST['fp'][$i];
        }

        $sql .= "('$numeroServicio', '".$fechaFacturacion->format('Y-m-d')."', '$mesActual', '', '$kwh', '$kw', '$fp','$idproyecto'),";
       
    }
} else if ($tipoTarifa === "bimensual") {
    for ($i = 0; $i < 6; $i++) {
        $mesActual = getMonthName($fechaFacturacion->format('n') - 1) . ' ' . $fechaFacturacion->format('Y');
        $fechaFacturacion->modify('-2 month');
        $mesAnterior = getMonthName($fechaFacturacion->format('n') - 1) . ' ' . $fechaFacturacion->format('Y');

        $fechaTexto = $mesAnterior . ' - ' . $mesActual;

        $kwh = $_POST['kwh'][$i];
        $kw = $_POST['kw'][$i];
        $fp = $_POST['fp'][$i];

        $sql .= "('$numeroServicio', '".$fechaFacturacion->format('Y-m-d')."', '$mesAnterior', '$mesActual', '$kwh', '$kw', '$fp','$idproyecto'),";
        
    }
}

// Eliminar la última coma de la consulta SQL
$sql = rtrim($sql, ",");

// Ejecutar la consulta SQL
if ($conexion->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente.";
 
} else {
    echo "Error al guardar los datos: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();

// Redirigir al usuario a una página de éxito o a donde desees
header("Location: ../Dimencionamiento/Dimencionamiento.php");

exit();

// Obtener nombre del mes en español
function getMonthName($monthIndex) {
  $meses = [
    "enero", "febrero", "marzo", "abril", "mayo", "junio",
    "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
  ];

  return $meses[$monthIndex];
}
?>
