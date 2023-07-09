<?php

include("../../BD/conec.php");

/* $id = $_GET['ID_USUARIO']; */

$nomproyecto = $_POST['nombreProyecto'];

$id_usuario = $_POST['id_usuario'];

// datos de mas 

$Temp_min = 0;
$Temp_max = 0;
$HSP = 0;
$Ubicacion = " Borre e inserte su ubicacion";
$ID_MFV = 1;
$VMPMIN = 0;
$Energiarequerida = 0;
$PotenciopicoFV = 0;
$NumerosdeModulos = 0;
$Areatotal = 0;
$VOCMAX = 0;
$activo_consumo = 0;
$tipo_tarifa = "niguna";
$tipo_servicio = "ninguna";
$Limitacion = "no";

$Proyecto = "INSERT INTO proyectos(NOMBRE_PROYECTO,ID_USUARIO,TEMP_MIN,TEMP_MAX,HSP,Ubicacion,ID_MFV,VMPMIN,Energiarequerida,PotenciopicoFV,NumerosdeModulos,Areatotal,VOCMAX,activo_consumo,tipo_tarifa,tipo_servicio,Limitacion)
VALUE('$nomproyecto','$id_usuario','$Temp_min','$Temp_max','$HSP','$Ubicacion','$ID_MFV','$VMPMIN','$Energiarequerida','$PotenciopicoFV','$NumerosdeModulos','$Areatotal','$VOCMAX','$activo_consumo','$tipo_tarifa','$tipo_servicio','$Limitacion')";
$resultado = mysqli_query($conexion, $Proyecto);

if (!$resultado) {
    echo '<script>alert("Los datos no se insertaron")</script>';
    $error = 1;
    $_SESSION['_error'] = $error;
    header("Location: ../Proyecto.php");

} else {
    echo '<script>alert("El proyecto se creó correctamente")</script>';
    header('Location: ../Proyecto.php');
}

?>

