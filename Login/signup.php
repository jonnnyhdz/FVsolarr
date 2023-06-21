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
                                        <label>Username</label>
                                        <input class="au-input au-input--full" type="text" name="nombre" id="username" placeholder="Exameple" required>
                                    </div>
                                    <div class="form-group">
                                        <label>surnames</label>
                                        <input class="au-input au-input--full" type="text" name="apellidos" id="apellidos" placeholder="Example" required>
                                    </div>
                                    <div class="form-group">
                                        <label>company name</label>
                                        <input class="au-input au-input--full" type="text" name="nombre_empresa" id="nombre_empresa" placeholder="Example" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input class="au-input au-input--full" type="email" name="correo" id="correo" placeholder="name@example.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="au-input au-input--full" type="password" name="contrasena" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>phone number</label>
                                        <input class="au-input au-input--full" type="tel" name="telefono" id="telefono" placeholder="1234567891" required pattern="\d{10}" maxlength="10">
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">State</label>
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
                                            <option value="persona_fisica">persona Fisica</option>
                                        </select>
                                    </div>
                                    <div class="login-checkbox">
                                        <label>
                                            <input type="checkbox" name="aggree">Agree the terms and policy
                                        </label>
                                    </div>
                                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                                    <div class="social-login-content">
                                        <div class="social-button">
                                            <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                            <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="register-link">
                                    <p>
                                        Already have account?
                                        <a href="signin.php">Sign In</a>
                                    </p>
                                </div>
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