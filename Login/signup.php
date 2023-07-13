<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title> FVSolar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="../Estilos_admi//theme.css" rel="stylesheet" media="all">
    <link href="../Estilos_admi/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Libraries Stylesheet -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Register -->

    <div class="">
        <div class="page-wrapper">
            <div class="page-content--bgf6">
                <div class="container">
                    <div class="login-wrap">
                        <div class="login-content">
                            <div class="login-logo">
                                <a href="#">
                                    <img src="images/icon/logo.png" alt="CoolAdmin">
                                </a>
                            </div>
                            <div class="login-form">
                                <form action="procesar_registro.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Correo Electronico</label>
                                        <input class="au-input au-input--full" type="email" name="correo" id="correo"
                                            placeholder="name@example.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirma Correo Electronico</label>
                                        <input class="au-input au-input--full" type="email" name="confirmar_correo"
                                            id="confirmar_correo" placeholder="name@example.com" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <div class="input-group">
                                            <input class="au-input au-input--full" type="password" name="contrasena"
                                                id="contrasena" placeholder="Password" required minlength="8"
                                                pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="ver_contrasena" onclick="togglePasswordVisibility()"><i
                                                        class="fa fa-eye"></i></button>
                                            </div>
                                        </div>
                                        <small id="contrasena-formato" class="form-text text-muted">La contraseña debe
                                            tener al menos 8 caracteres, incluyendo al menos 1 mayúscula, 1 número y 1
                                            carácter especial.</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirma Contraseña</label>
                                        <div class="input-group">
                                            <input class="au-input au-input--full" type="password"
                                                name="confirmar_contrasena" id="confirmar_contrasena"
                                                placeholder="Confirm Password" required minlength="8"
                                                pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="ver_confirmar_contrasena"
                                                    onclick="toggleConfirmPasswordVisibility()"><i
                                                        class="fa fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="au-input au-input--full" type="text" name="nombre" id="username"
                                            placeholder="Example" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input class="au-input au-input--full" type="text" name="apellidos"
                                            id="apellidos" placeholder="Example" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre Empresa</label>
                                        <input class="au-input au-input--full" type="text" name="nombre_empresa"
                                            id="nombre_empresa" placeholder="Example" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Numero de telefono</label>
                                        <input class="au-input au-input--full" type="tel" name="telefono" id="telefono"
                                            placeholder="1234567891" required pattern="\d{10}" maxlength="10">
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select class="form-control" name="estado" id="estado" required>
                                            <option value="">Seleccione un estado</option>
                                            <option value="Aguascalientes">Aguascalientes</option>
                                            <option value="Baja California">Baja California</option>
                                            <option value="Baja California Sur">Baja California Sur</option>
                                            <option value="Campeche">Campeche</option>
                                            <option value="Chiapas">Chiapas</option>
                                            <option value="Chihuahua">Chihuahua</option>
                                            <option value="Ciudad de México">Ciudad de México</option>
                                            <option value="Coahuila">Coahuila</option>
                                            <option value="Colima">Colima</option>
                                            <option value="Durango">Durango</option>
                                            <option value="Guanajuato">Guanajuato</option>
                                            <option value="Guerrero">Guerrero</option>
                                            <option value="Hidalgo">Hidalgo</option>
                                            <option value="Jalisco">Jalisco</option>
                                            <option value="Michoacán">Michoacán</option>
                                            <option value="Morelos">Morelos</option>
                                            <option value="Nayarit">Nayarit</option>
                                            <option value="Nuevo León">Nuevo León</option>
                                            <option value="Oaxaca">Oaxaca</option>
                                            <option value="Puebla">Puebla</option>
                                            <option value="Querétaro">Querétaro</option>
                                            <option value="Quintana Roo">Quintana Roo</option>
                                            <option value="San Luis Potosí">San Luis Potosí</option>
                                            <option value="Sinaloa">Sinaloa</option>
                                            <option value="Sonora">Sonora</option>
                                            <option value="Tabasco">Tabasco</option>
                                            <option value="Tamaulipas">Tamaulipas</option>
                                            <option value="Tlaxcala">Tlaxcala</option>
                                            <option value="Veracruz">Veracruz</option>
                                            <option value="Yucatán">Yucatán</option>
                                            <option value="Zacatecas">Zacatecas</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="persona">Tipo de persona:</label>
                                        <select class="form-control" name="persona" id="persona" required>
                                            <option value="">Tipo Persona</option>
                                            <option value="persona_moral">Persona Moral</option>
                                            <option value="persona_fisica">Persona Fisica</option>
                                        </select>
                                    </div>
                                    <div class="login-checkbox">
                                        <label>
                                            <input type="checkbox" name="aggree">Agree to the terms and policy
                                        </label>
                                    </div>
                                    <button class="au-btn au-btn--block au-btn--green m-b-20"
                                        type="submit">Register</button>
                                 <!--   <div class="social-login-content">
                                        <div class="social-button">
                                            <button class="au-btn au-btn--block au-btn--blue m-b-20">Register with
                                                Facebook</button>
                                            <button class="au-btn au-btn--block au-btn--blue2">Register with
                                                Twitter</button>
                                        </div>
                                    </div> -->
                                </form>
                                <div class="register-link">
                                    <p>
                                    ¿Ya tienes cuenta?
                                        <a href="signin.php">Iniciar sesión</a>
                                    </p>
                                </div>
                                <script>
                                function togglePasswordVisibility() {
                                    var passwordInput = document.getElementById("contrasena");
                                    if (passwordInput.type === "password") {
                                        passwordInput.type = "text";
                                    } else {
                                        passwordInput.type = "password";
                                    }
                                }

                                function toggleConfirmPasswordVisibility() {
                                    var confirmPasswordInput = document.getElementById("confirmar_contrasena");
                                    if (confirmPasswordInput.type === "password") {
                                        confirmPasswordInput.type = "text";
                                    } else {
                                        confirmPasswordInput.type = "password";
                                    }
                                }

                                var correoInput = document.getElementById("correo");
                                var confirmarCorreoInput = document.getElementById("confirmar_correo");
                                var contrasenaInput = document.getElementById("contrasena");
                                var confirmarContrasenaInput = document.getElementById("confirmar_contrasena");

                                correoInput.addEventListener("input", validateEmailMatch);
                                confirmarCorreoInput.addEventListener("input", validateEmailMatch);
                                contrasenaInput.addEventListener("input", validatePasswordMatch);
                                confirmarContrasenaInput.addEventListener("input", validatePasswordMatch);

                                function validateEmailMatch() {
                                    var correoValue = correoInput.value;
                                    var confirmarCorreoValue = confirmarCorreoInput.value;
                                    if (correoValue !== confirmarCorreoValue) {
                                        confirmarCorreoInput.setCustomValidity("El correo no coincide.");
                                    } else {
                                        confirmarCorreoInput.setCustomValidity("");
                                    }
                                }

                                function validatePasswordMatch() {
                                    var contrasenaValue = contrasenaInput.value;
                                    var confirmarContrasenaValue = confirmarContrasenaInput.value;
                                    if (contrasenaValue !== confirmarContrasenaValue) {
                                        confirmarContrasenaInput.setCustomValidity("La contraseña no coincide.");
                                    } else {
                                        confirmarContrasenaInput.setCustomValidity("");
                                    }
                                }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- JavaScript Libraries -->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="../js/main2.js"></script>
</body>

</html>