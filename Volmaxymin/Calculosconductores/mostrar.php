<?php

include('../../BD/conec.php');

$valorRecibido = $_POST['id'] ?? 0;

$consulta = "SELECT * FROM tabla_cable_fotovoltaico WHERE calibre_awg = $valorRecibido";
$resultado = mysqli_query($conexion, $consulta);
$fila = mysqli_fetch_array($resultado);


$ver = $fila['resistencia_conductor'];;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="hidden" id="valorVer" value="<?php echo $ver; ?>">
    <p> <?php echo $fila['resistencia_conductor']; ?> &#937;/km </p>
    <script src="CalculosC.js"></script>
</body>

</html>