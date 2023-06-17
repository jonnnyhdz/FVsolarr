<?php

include("../../BD/conec.php");


$consulta = "SELECT * FROM cables ";
$resultado = mysqli_query($conexion, $consulta);
$idproyecto = 1;
$contador_modulos = 2;

/* modulos - se recolecta de voltamaxymin = $vmp * $nummodulosfv;*/


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

<style>
    /* Estilos generales */
    body {
        font-family: 'Open Sans', sans-serif;
        background-color: #f5f5f5;
        color: #333;
        margin: 5%;
        padding: 5%;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    p {
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    /* Estilos de la tabla */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ccc;
    }

    th {
        font-weight: 600;
    }

    /* Estilos de los formularios */
    input[type="number"],
    select.form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    /* Estilos de los botones */
    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 10px;
    }

    button:hover {
        background-color: #0056b3;
    }

    /* Estilos adicionales */
    .alert {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }


    .l {
        text-align: center;
    }
</style>


<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>
    <div>
        <p> </p>
    </div>
    <?php

    $imax = 17.45;
    $imaxinversor = 58.30;
    $ShortCircuitCurrentIsc = 13.95; /* viene de dimensionamiento */
    $corrientefusible = $ShortCircuitCurrentIsc * 1.25 * 1.25;
    $voltentrada  = 1100;
    $ampasidad13_1 = $imax * 1.25; /* imax(17.45)* 1.25  Viene de la hoja Corrientemax.php*/
    $ampasidad13_2 = number_format($imax / (0.94 * 1), 2);
    $ampasidad15_1 =  number_format(($imaxinversor * 1.25), 2); /* fila['Max_corriente_salida] */
    $ampasidad15_2 = number_format($imaxinversor / (0.94 * 1), 2);





    ?>
    <table>
        <tr>
            <th class="l">12. Determinar las protecciones que se instalaran en corriente continua </th>
            <td></td>
        </tr>
        <tr>
            <th>Corriente Fusible</th>
            <td><?php echo $ShortCircuitCurrentIsc ?> A</td>
        </tr>
        <tr>
            <th>Corriente Fusible</th>
            <td><?php echo $corrientefusible ?> A</td>
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
            <td><?php echo $voltentrada ?> V</td>
        </tr>
        <tr>
            <th class="l"> 13. Calcular conductores en corriente continua </th>
            <td></td>
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
                <td> Ampacidad: <?php echo $ampasidad13_1 ?> </td>
                <td> Ampacidad: <?php echo $ampasidad13_2 ?> </td>
            </tr>

            <tr>
                <th> Selección de conductor</th>
                <td>
                    <select class="form-control border-0 rounded-pill" name="cat" aria-label="Floating label select example" onclick="guardar();">
                        <?php
                        $consulta2 = "SELECT * FROM tablaampacidad";
                        $resultado2 = mysqli_query($conexion, $consulta2);
                        while ($fila2 = mysqli_fetch_array($resultado2)) {
                            $selected = ($fila2["id_cables"] == $fila["id_cables"]) ? "selected" : "";
                        ?>
                            <option value="<?php echo $fila2["id_cables"]; ?>" <?php echo $selected; ?>>
                                <span style="margin: 0 5px;"> calibre </span>
                                <?php echo $fila2["calibre"]; ?>
                                <span style="margin: 0 5px;"> AWG --- </span>
                                <?php echo $fila2["Area"]; ?>
                                <span style="margin: 0 5px;"> mm&sup2; </span>
                            </option>
                        <?php
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="l">14. Determinar las protecciones de sobretensión que se instalaran en corriente alterna</th>
                <td></td>
            </tr>
            <tr>
                <td> Calculo de corriente de ITM: <?php echo $ampasidad15_1 ?> </td>
                <td> </td>
            </tr>
            <tr>
                <th> Calculo de corriente ITM </th>
                <td>
                    <select id="corriente">
                        <option value=""> Elija una opcion </option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="60">60</option>
                        <option value="70">70</option>
                        <option value="80">80</option>
                        <option value="90">90</option>
                        <option value="100">100</option>
                        <option value="110">110</option>
                        <option value="120">120</option>
                        <option value="130">130</option>
                        <option value="140">140</option>
                        <option value="150">150</option>
                        <option value="160">160</option>
                        <option value="170">170</option>
                        <option value="280">180</option>
                        <option value="190">190</option>
                        <option value="200">200</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Fases</th>
                <td>
                    <input type="number" id="fases" onchange="calcularITM()">
                </td>
            </tr>
            <tr>
                <th>Resultado</th>
                <td>
                    <span id="resultado"></span>
                </td>
            </tr>
            <tr>
                <th class="l"> 15. Calcular conductores en corriente alterna </th>
                <td></td>
            </tr>

            <script>
                function calcularITM() {
                    var corriente = document.getElementById("corriente").value;
                    var fases = document.getElementById("fases").value;

                    if (corriente && fases) {
                        var resultado = corriente * fases;
                        document.getElementById("resultado").textContent = fases + " X " + corriente + " = " + resultado;
                    } else {
                        document.getElementById("resultado").textContent = "";
                    }
                }
            </script>
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
                    Ampacidad: <?php echo $ampasidad15_1 ?>
                </td>
                <td>
                    Ampacidad = <?php echo  $ampasidad15_2 ?>
                </td>
            </tr>
            <tr>
                <th> Selección de conductor</th>
                <td>
                    <select class="form-control border-0 rounded-pill" id="calibreSelect" aria-label="Floating label select example" onclick="guardar();">
                        <option value=""> Elija un opcion </option>
                        <?php
                        $consulta2 = "SELECT * FROM tablaampacidad";
                        $resultado2 = mysqli_query($conexion, $consulta2);
                        while ($fila2 = mysqli_fetch_array($resultado2)) {
                            $selected = ($fila2["id_cables"] == $fila["id_cables"]) ? "selected" : "";
                        ?>
                            <option value="<?php echo $fila2["id_cables"]; ?>" <?php echo $selected; ?>>
                                <span style="margin: 0 5px;"> calibre </span>
                                <?php echo $fila2["calibre"]; ?>
                                <span style="margin: 0 5px;"> AWG --- </span>
                                <?php echo $fila2["Area"]; ?>
                                <span style="margin: 0 5px;"> mm&sup2; </span>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="l"> 16. Calcular caída de tensión.</th>
                <td></td>
            </tr>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>
                    R: Resistencia del conductor:
                </th>
                <th> <span id="mostrar_mensaje" class="mostrar"> 45 </span> </th>
            </tr>
            <script>
                function guardar() {
                    // Obtener el valor seleccionado
                    var calibreSelect = document.getElementById("calibreSelect");
                    var calibreOption = calibreSelect.options[calibreSelect.selectedIndex];
                    var calibreText = calibreOption.innerText;
                    var calibre = calibreText.match(/\d+/)[0];

                    var parametros = {
                        "id": calibre
                    };

                    $.ajax({
                        data: parametros,
                        url: 'mostrar.php',
                        type: 'POST',
                        beforeSend: function() {
                            $('#mostrar_mensaje').html("Cargando......");
                        },
                        success: function(mensaje) {
                            $('#mostrar_mensaje').html(mensaje);
                        }
                    });
                }
            </script>
        </thead>
    </table>
    <div class="bg-secondary rounded h-100 p-1">
        <?php
        include("../../BD/conec.php");

        $inversores = array();

        $consulta = "SELECT escogido_mfv.ID_ESCOGIDO, escogido_mfv.ID_INVERSORES, inversores.Marca, inversores.Modelo, inversores.No_rastreadores_MPPT, inversores.Max_corriente_cortocircuito_rastreador_MPPT, inversores.Max_corriente_entrada_rastreador_MPPT FROM escogido_mfv
                    JOIN inversores ON escogido_mfv.ID_INVERSORES = inversores.id_inversor
                    WHERE escogido_mfv.ID_PROYECTO = '$idproyecto'";
        $resultado = mysqli_query($conexion, $consulta);

        while ($fila = mysqli_fetch_array($resultado)) {
            $idInversor = $fila['ID_INVERSORES'];
            if (!isset($inversores[$idInversor])) {
                $inversores[$idInversor] = array(
                    'ID_INVERSORES' => $fila['ID_INVERSORES'],
                    'Marca' => $fila['Marca'],
                    'Modelo' => $fila['Modelo'],
                    'No_rastreadores_MPPT' => $fila['No_rastreadores_MPPT'],
                    /* 'voc' => $voc, // Agregar voc al array */
                    'contador_modulos' => $contador_modulos, // Agregar contador_modulos al array
                );
            }
        }

        foreach ($inversores as $inversor) {
            echo '<div class="container-fluid mt-4 pt-4 px-4 m-2">';
            echo '<div class="bg-secondary text-center rounded">';
            echo '<div class="row g-4">';
            echo '<div class="col-sm-12 col-xl-12">';
            echo '<div class="bg-secondary rounded h-100 p-1">';
            echo '<table id="myTable">';

            echo '<tr>';
            echo '<th colspan="6">Inversor: ' . $inversor['Marca'] . ' ' . $inversor['Modelo'] . '</th>';
            echo '</tr>';

            echo '<tr>';
            echo '<th> Circuito FV </th>';
            echo '<th> Corriente nominal </th>';
            echo '<th>V.Nominal</th>';
            echo '<th> Distancia  </th>';
            echo '<th>Potencia</th>';
            echo '<th>Corriente</th>';
            echo '</tr>';

            $contador_modulos = $inversor['contador_modulos']; // Obtener el valor de contador_modulos del array

            for ($i = 1; $i <= $contador_modulos; $i++) {
                echo '<tr>';
                echo '<td>Circuito ' . $i . '</td>';
                echo '<td class="corrientenominal"> ....</td>';
                echo '<td class="total-vmax"> ....</td>';
                echo '<td><input type="number"  class="vmaximo-input form-control border-0 rounded-pill my-2 input-sm" onchange="calculateTotal(this)"></td>';
                echo '<td class="potencia-input "> .... </td>';
                echo '<td class="corriente-input"> ....</td>';
                echo '</tr>';
            }

            echo '<tr>';
            echo '</tr>';

            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        ?>
        <script src="CalculosC.js"></script>

    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>

</html>


<?php
/* } else {
    // Si no se encuentra el usuario en la base de datos
    echo "Error al obtener los datos del usuario.";
} */
?>