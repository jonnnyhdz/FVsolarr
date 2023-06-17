<form action="procesar_formulario.php" method="POST" enctype="multipart/form-data">
 
  <label for="foto">Foto de perfil:</label>
  <input type="file" id="imagen" name="imagen" accept="image/*" required><br>
  
  <input type="submit" value="Enviar">
</form>

<?php 

include("../BD/conec.php");

$idUsuario = 1; // ID del usuario cuya foto quieres mostrar

$query = "SELECT imagen FROM usuarios WHERE id = $idUsuario";
$resultado = mysqli_query($conexion, $query);
$fila = mysqli_fetch_assoc($resultado);
$contenidoFoto = $fila['imagen'];

// Genera la etiqueta <img> para mostrar la foto
echo '<img src="data:image/jpeg;base64,' . base64_encode($contenidoFoto) . '" alt="Foto de perfil">';


?>
