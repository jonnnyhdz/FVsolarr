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


        <!-- Sign In Start -->
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
                            <h4>Iniciar sesión</h4>
                        </div>
                        <form method="POST" action="validar_login.php">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="correo" id="correo" placeholder="name@example.com" required>
                                <label for="floatingInput">correo electrónico</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Password" required>
                                <label for="floatingPassword">contraseña</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="recuerdame" id="recuerdame">
                                    <label class="form-check-label" for="recuerdame">Recuérdame</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Iniciar sesión</button>
                        </form>
                        <p class="text-center mb-0">¿Olvidaste tu contraseña?<a href="">Recuperar</a></p>
                        <p class="text-center mb-0">¿No tienes una cuenta?<a href="signup.php">Crear cuenta</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
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