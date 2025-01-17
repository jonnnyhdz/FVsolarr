<?php
session_start();
include("../BD/conec.php");

if(isset($_POST['correo']) && isset($_POST['contrasena'])) {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consultar la información del usuario en la base de datos
    $query = "SELECT * FROM usuarios WHERE correo='$correo'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        if (password_verify($contrasena, $usuario['contrasena'])) {
            // Inicio de sesión exitoso
            $_SESSION['correo'] = $correo;
            $_SESSION['id_usuario'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];
            $_SESSION['imagen'] = $usuario['imagen'];
            unset($_SESSION['_incorrecto']);

            header ('Location: ../Proyecto/Proyecto.php', true, 301);

            /* http://localhost/UL-SOLAR/ */
            
            exit();
        } else {
            // Contraseña incorrecta
        
            $_SESSION['_incorrecto'] = 1; 
            header ('Location: signin.php', true, 301);

            /* echo '<script>alert("Contraseña incorrecta. Inténtelo de nuevo."); window.location.href="signin.php?mensaje=Contraseña incorrecta. Inténtelo de nuevo.";</script>'; */
            exit();
        }
    } else {
        // Usuario no encontrado
        echo '<script>alert("Correo no encontrado. Regístrese para continuar."); window.location.href="signup.php?mensaje=Regístrese para continuar.";</script>';
        exit();
    }
}

mysqli_close($conexion);

?>