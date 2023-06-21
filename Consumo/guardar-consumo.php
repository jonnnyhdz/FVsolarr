<?php
include "../BD/conec.php";

session_start();

$idproyecto = $_SESSION['ID_PROYECTO'];
$_SESSION['ID_PROYECTO'] = $idproyecto;

// Obtener los datos del formulario
$numeroServicio = $_POST['numeroServicio'];
$fechaFacturacion = new DateTime($_POST['fechaFacturacion']); // Convertir a objeto DateTime
$tipoTarifa = $_POST['tipoTarifa'];
$tipoServicio = $_POST['tipoServicio'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO facturas (no_servicio, fecha_facturacion, mes, mes2, kwh, kw, fp,Id_proyecto) VALUES ";

if ($tipoTarifa === "mensual") {
    for ($i = 0; $i < 12; $i++) {
        $mesActual = $fechaFacturacion->format('Y-m-d');

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

        $sql .= "('$numeroServicio', '".$fechaFacturacion->format('Y-m-d')."','$mesActual', '', '$kwh', '$kw', '$fp','$idproyecto'),";

        // Restar 1 mes a la fecha de facturación para la siguiente iteración
        $fechaFacturacion = date_sub($fechaFacturacion, date_interval_create_from_date_string('1 month'));
    }
}else  if ($tipoTarifa === "bimensual") {
    $mesActual = intval($fechaFacturacion->format('n')); // Obtener el número del mes actual
    $diaFacturacion = intval($fechaFacturacion->format('d')); // Obtener el día de la fecha de facturación
    
    for ($i = 0; $i < 6; $i++) {
        // Restar 2 meses al mes actual para obtener el mes anterior
        $mesAnterior = ($mesActual - 2) <= 0 ? ($mesActual - 2 + 12) : ($mesActual - 2);
        
        $kwh = $_POST['kwh'][$i];
        $kw = $_POST['kw'][$i];
        $fp = $_POST['fp'][$i];

        // Obtener el año correspondiente al mes anterior y al mes actual
        $anioMesAnterior = $mesAnterior > $mesActual ? $fechaFacturacion->format('Y') - 1 : $fechaFacturacion->format('Y');
        $anioMesActual = $fechaFacturacion->format('Y');

        // Formatear el mes anterior y el mes actual en el formato "0000-00-00"
        $mesAnteriorFormatted = $anioMesAnterior . '-' . str_pad($mesAnterior, 2, '0', STR_PAD_LEFT) . '-' . $diaFacturacion;
        $mesActualFormatted = $anioMesActual . '-' . str_pad($mesActual, 2, '0', STR_PAD_LEFT) . '-' . $diaFacturacion;

        $sql .= "('$numeroServicio', '".$fechaFacturacion->format('Y-m-d')."', '$mesAnteriorFormatted', '$mesActualFormatted', '$kwh', '$kw', '$fp','$idproyecto'),";

        // Actualizar los valores de mes anterior y mes actual para la próxima iteración
        $mesActual = $mesAnterior;

        // Restar 2 meses a la fecha de facturación para la siguiente iteración
        $fechaFacturacion = date_sub($fechaFacturacion, date_interval_create_from_date_string('2 months'));
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
header("Location: Consumo.php");

exit();

?>