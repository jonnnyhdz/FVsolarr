<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../css/toggle.css">
    <link id="theme" rel="stylesheet" href="../css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link id="style" rel="stylesheet" href="../css/style.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...tu-codigo-de-integridad..." crossorigin="anonymous" />
    <script src="../js/day.js"></script>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="navbar-nav align-items-center ms-auto">
                            <label class="toggle">
                                <input type="checkbox" id="toggleSwitch" onchange="changeTheme()" />
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="../index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>FVsolar</h3>
                            </a>
                            <h3>Registro</h3>
                        </div>
                        <form action="procesar_registro.php" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control"  name="nombre" id="nombre" placeholder="Exameple" required>
                            <label for="nombre">nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control"  name="apellidos" id="apellidos" placeholder="Example Example" required>
                            <label for="Apellidos">Apellidos</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control"  name="nombre_empresa" id="nombre_empresa" placeholder="Example" required>
                            <label for="Empresa">Nombre Empresa</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="correo" id="correo" placeholder="name@example.com">
                            <label for="Correo electrónico">Correo electrónico</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Password">
                            <label for="Contraseña">Contraseña</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="1234567891" required pattern="\d{10}" maxlength="10">
                            <label for="telefono">Teléfono</label>
                            
                        </div>
                        <div class="form-floating mb-3">
                            <div class="bg-secondary rounded h-100 p-4">
                                <label for="estado">Estado:</label>
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="estado" id="estado" required>
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
                        </div>
                        <div class="form-floating mb-3">
                            <div class="bg-secondary rounded h-100 p-4">
                                <label for="persona">Tipo de persona:</label>
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="persona" id="persona" required>
                                    <option value="">Tipo Persona</option>
                                    <option value="persona_moral">Persona Moral</option>
                                    <option value="persona_fisica">persona Fisica</option>
                                </select>
                            </div>
                        </div>

                       
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Registrarse</button>
                    </form>
                        <p class="text-center mb-0">¿Ya tengo una cuenta? <a href="signin.php">Iniciar sesión</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>