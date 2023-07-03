<?php
include("../../BD/conec.php");

// Obtener los valores enviados mediante AJAX
$potenciaPico = $_POST['potenciaPico'];
$numModulos = $_POST['numModulos'];
$areaTotal = $_POST['areaTotal'];
$idproyecto = $_POST['idProyecto'];

// Función para validar un número decimal
function validarNumeroDecimal($valor) {
  // Verificar si el valor es un número decimal válido con un solo punto decimal
  $regex = '/^\d+(\.\d+)?$/';
  if (preg_match($regex, $valor)) {
    return floatval($valor);
  } else {
    return null;
  }
}

// Inicializar variables de mensaje y valores
$seleccion = 'no';
$mensajeModificacion1 = '';
$mensajeModificacion2 = '';
$mensajeModificacion3 = '';
$numModulosValue = $numModulos;
$areaTotalValue = $areaTotal;
$potenciaPicoValue = $potenciaPico;

if (isset($_POST['seleccion'])) {
  $seleccion = $_POST['seleccion'];
  if ($seleccion === 'si') {
    $numModulosValue = '';
    $areaTotalValue = '';
    $potenciaPicoValue = '';
    $mensajeModificacion1 = "Número de Módulos: $numModulos";
    $mensajeModificacion2 = "Área Total para instalar módulos FV: $areaTotal";
    $mensajeModificacion3 = "Potencia Pico FV: $potenciaPico";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Limitar</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
  <div>
    <form>
      
      <label for="seleccion">Limitar:</label>
      <select id="seleccion" onchange="mostrarDatos()">
        <option value="no" <?php if ($seleccion === 'no') echo 'selected'; ?>>No</option>
        <option value="si" <?php if ($seleccion === 'si') echo 'selected'; ?>>Sí</option>
      </select>

      <br><br>
      <label for="numModulos">Número de Módulos:</label>
      <input type="text" id="numModulos" value="<?php echo $numModulosValue; ?>" <?php if ($seleccion === 'no') echo 'readonly'; ?>>
      <p id="mensajeModificacion1"><?php echo $mensajeModificacion1; ?></p>
      <br><br>
      <label for="areaTotal">Área Total para instalar módulos FV:</label>
      <input type="text" id="areaTotal" value="<?php echo $areaTotalValue; ?>" <?php if ($seleccion === 'no') echo 'readonly'; ?>>
      <p id="mensajeModificacion2"><?php echo $mensajeModificacion2; ?></p>
      <br><br>
      <label for="potenciaPico">Potencia Pico FV:</label>
      <input type="text" id="potenciaPico" value="<?php echo $potenciaPicoValue; ?>" <?php if ($seleccion === 'no') echo 'readonly'; ?>>
      <p id="mensajeModificacion3"><?php echo $mensajeModificacion3; ?></p>

      <button type="button" onclick="guardarDatos()">Guardar</button>
      <input type="hidden" name="idproyecto" value="<?php echo $idproyecto; ?>">
    </form>

    <p id="dato"></p>
  </div>

  <script>
    function mostrarDatos() {
      var seleccion = document.getElementById("seleccion").value;
      var numModulos = document.getElementById("numModulos").value;
      var areaTotal = document.getElementById("areaTotal").value;
      var potenciaPico = document.getElementById("potenciaPico").value;

      if (seleccion === 'si') {
        document.getElementById("numModulos").readOnly = false;
        document.getElementById("areaTotal").readOnly = false;
        document.getElementById("potenciaPico").readOnly = false;
        document.getElementById("numModulos").value = '';
        document.getElementById("areaTotal").value = '';
        document.getElementById("potenciaPico").value = '';
        document.getElementById("mensajeModificacion1").innerHTML = "Número de Módulos: " + numModulos;
        document.getElementById("mensajeModificacion2").innerHTML = "Área Total para instalar módulos FV: " + areaTotal;
        document.getElementById("mensajeModificacion3").innerHTML = "Potencia Pico FV: " + potenciaPico;
      } else {
        document.getElementById("numModulos").readOnly = true;
        document.getElementById("areaTotal").readOnly = true;
        document.getElementById("potenciaPico").readOnly = true;
        document.getElementById("numModulos").value = "<?php echo $numModulos; ?>";
        document.getElementById("areaTotal").value = "<?php echo $areaTotal; ?>";
        document.getElementById("potenciaPico").value = "<?php echo $potenciaPico; ?>";
        document.getElementById("mensajeModificacion1").innerHTML = "";
        document.getElementById("mensajeModificacion2").innerHTML = "";
        document.getElementById("mensajeModificacion3").innerHTML = "";
      }
    }

    function guardarDatos() {
  var seleccion = document.getElementById("seleccion").value;
  var numModulos = document.getElementById("numModulos").value;
  var areaTotal = document.getElementById("areaTotal").value;
  var potenciaPico = document.getElementById("potenciaPico").value;
  var idProyecto = "<?php echo $idProyecto; ?>";

  if (seleccion === 'no') {
    numModulos = "<?php echo $numModulos; ?>";
    areaTotal = "<?php echo $areaTotal; ?>";
    potenciaPico = "<?php echo $potenciaPico; ?>";
  }

  // Realizar la petición AJAX o enviar los datos al servidor para actualizar la base de datos
  $.ajax({
    type: "POST",
    url: "Calculo4.php", // Ruta al archivo PHP que realizará la actualización
    data: {
      numModulos: numModulos,
      areaTotal: areaTotal,
      potenciaPico: potenciaPico,
      idProyecto: idProyecto
    },
    success: function(response) {
      // Manejar la respuesta del servidor si es necesario
      console.log(response);
    },
    error: function(xhr, status, error) {
      // Manejar el error si ocurre
      console.log(error);
    }
  });
}
  </script>
</body>

</html>
