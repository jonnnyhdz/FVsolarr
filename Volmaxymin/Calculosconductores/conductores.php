<?php

include("../../BD/conec.php");


$consulta = "SELECT * FROM cables ";
$resultado = mysqli_query($conexion, $consulta);

/* 
session_start();


// Verificar si la sesión está activa
if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['correo'])) {
    // Redirigir a la página de inicio de sesión si no se ha iniciado sesión
    header("Location: ../index.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];


// Realizar una consulta en la base de datos utilizando el ID de usuario

$query = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
$resultado = mysqli_query($conexion, $query);

mysqli_error($conexion);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Obtener los datos del usuario
    $usuario = mysqli_fetch_assoc($resultado);

    // Acceder a los campos específicos del usuario

    $id_usuario = $_SESSION['id_usuario'];

    // Mostrar los datos del usuario dentro del contenido HTML */
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="../css/toggle.css">
        <link id="theme" rel="stylesheet" href="../css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link id="style" rel="stylesheet" href="../css/style.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...tu-codigo-de-integridad..." crossorigin="anonymous" />
        <script src="../js/day.js"></script>
        <link rel="stylesheet" href="../css/estiloP.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php

    $ShortCircuitCurrentIsc = 13.95; /* viene de dimensionamiento */
    $corrientefusible = $ShortCircuitCurrentIsc * 1.25 * 1.25;
    $voltentrada  = 1100;
    $ampasidad = 17.45 * 1.25; /* imax * 1.25 */




    ?>
    <table>
        <tr>
            <th>Corriente Fusible</th>
            <td><?php echo $corrientefusible ?></td>
        </tr>
        <tr>
            <th>Fusible a escoger</th>
            <td><input type="number"></td>
        </tr>
        <tr>
            <th>Recomendado por fabricante de módulo</th>
            <td><input type="number"></td>
        </tr>
        <tr>
            <th>Máxima voltaje de entrada del inversor</th>
            <td><?php echo $voltentrada ?></td>
        </tr>
        <tr>
            <th> Ampasindad mayor </th>
            <td> <?php echo $ampasidad ?> </td>
        </tr>
        <tr>
            <th> Selección de conductor</th>
            <td>
                <select class="form-control border-0 rounded-pill" name="cat" aria-label="Floating label select example" onclick="guardar();">
                    <?php
                    $consulta2 = "SELECT * FROM cables";
                    $resultado2 = mysqli_query($conexion, $consulta2);
                    while ($fila2 = mysqli_fetch_array($resultado2)) {
                        $selected = ($fila2["id_cables"] == $fila["id_cables"]) ? "selected" : "";
                    ?>
                        <option value="<?php echo $fila2["id_cables"]; ?>" <?php echo $selected; ?>>
                            <span style="margin: 0 5px;"> AWG: </span>
                            <?php echo $fila2["AWG"]; ?>
                            <span style="margin: 0 5px;"> mm&sup2; : </span>
                            <?php echo $fila2["medida"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th> Selección No conductor</th>
            <td>
                <select class="form-control border-0 rounded-pill" name="cat" aria-label="Floating label select example" onclick="guardar();">
                    <?php
                    $consulta2 = "SELECT * FROM cables";
                    $resultado2 = mysqli_query($conexion, $consulta2);
                    while ($fila2 = mysqli_fetch_array($resultado2)) {
                        $selected = ($fila2["id_cables"] == $fila["id_cables"]) ? "selected" : "";
                    ?>
                        <option value="<?php echo $fila2["id_cables"]; ?>" <?php echo $selected; ?>>
                            <span style="margin: 0 5px;"> AWG: </span>
                            <?php echo $fila2["AWG"]; ?>
                            <span style="margin: 0 5px;"> mm&sup2; : </span>
                            <?php echo $fila2["medida"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th> Calculo de corriente ITM </th>
            <td> <label for="corriente">Seleccione un valor de corriente:</label>
                <select id="corriente">
                    <option value=""> Elija una opcion </option>
                    <option value="1">15</option>
                    <option value="2">20</option>
                    <option value="3">25</option>
                    <option value="4">30</option>
                    <option value="5">35</option>
                    <option value="6">40</option>
                    <option value="7">50</option>
                    <option value="8">60</option>
                    <option value="9">70</option>
                    <option value="10">80</option>
                    <option value="11">90</option>
                    <option value="12">100</option>
                    <option value="13">110</option>
                    <option value="14">120</option>
                    <option value="15">130</option>
                    <option value="16">140</option>
                    <option value="17">150</option>
                    <option value="18">160</option>
                    <option value="19">170</option>
                    <option value="20">180</option>
                    <option value="21">190</option>
                    <option value="22">200</option>
                </select>
            </td>
        </tr>
        <tr>
            <th> ITM a escojer </th>
            <td>
                <div id="vista">
                    <span id="valorSeleccionado"></span>
                </div>
            </td>
            <script>
                var selectElement = document.getElementById("corriente");
                var vistaElement = document.getElementById("valorSeleccionado");
                selectElement.addEventListener("change", function() {
                    var selectedValue = selectElement.value;
                    var originalValue = parseInt(selectElement.options[selectedValue].text);
                    var resultado = originalValue * 3;
                    vistaElement.textContent = resultado;
                });
            </script>
        </tr>
        <tr>
            <th> ITM a escojer </th>
            <td>
                <div id="vista">
                    <span id="valorSeleccionado"></span>
                </div>
            </td>
        </tr>
    </table>
    <table>
    <thead>
      <tr>
        <th>Método 1</th>
        <th>Método 2</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>125% de la corriente máxima</td>
        <td>Según condiciones de uso a la corriente máxima</td>
      </tr>
      <tr>
        <td>
            AMPACIDAD: <?php echo $imax = 1.25 * 43.40 ?>
        </td>
        <td>
          Ampacidad = Imax / (Fajuste x Fcorrección)
        </td>
      </tr>
      <tr>
        <td>
          Imax = 1.25 x 43.60 A<br>
          Ampacidad = 1.25 x 43.60 A
        </td>
        <td>
        Se toma de la tabla 310-15(b)(2)(a)
        </td>
      </tr>
    </tbody>
  </table>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


</body>

</html>


<?php
/* } else {
    // Si no se encuentra el usuario en la base de datos
    echo "Error al obtener los datos del usuario.";
} */
?>