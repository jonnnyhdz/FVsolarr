<?php
session_start();
include("../BD/conec.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];
    $persona = $_POST['persona'];

    // Generar el hash de la contraseña
    $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar los datos en la tabla "usuarios"
    $query = "INSERT INTO usuarios (nombre, apellidos, nombre_empresa, correo, contrasena, numero_telefono, estado, persona) 
              VALUES ('$nombre', '$apellidos', '$nombre_empresa', '$correo', '$hashedPassword', '$telefono', '$estado', '$persona')";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
        // Registro exitoso
        $_SESSION['correo'] = $correo;
        // Redirigir a la página de inicio después del registro exitoso
        echo '<script>alert("Registro exitoso, ahora puedes iniciar sesión."); window.location.href="signin.html";</script>';
        exit();
    } else {
        // Error al registrar
        echo '<script>alert("Error al registrar. Inténtelo de nuevo."); window.location.href="signup.html";</script>';
        exit();
    }
}

mysqli_close($conexion);
?>
