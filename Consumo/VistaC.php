<?php
include("../BD/conec.php");
session_start();

$id_usuario = $_SESSION['id_usuario'];
$id_proyecto = $_SESSION['ID_PROYECTO'];

// Verificar si la sesión está activa
if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['correo'])) {
    // Redirigir a la página de inicio de sesión si no se ha iniciado sesión
    header("Location: ../index.php");
    exit();
}



$query = "SELECT * FROM usuarios WHERE id = $id_usuario";
$resultado = mysqli_query($conexion, $query);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Obtener los datos del usuario
    $usuario = mysqli_fetch_assoc($resultado);

    // Acceder a los campos específicos del usuario

    $_SESSION['ID_PROYECTO'] = $id_proyecto;

    $consulta = "SELECT * FROM proyectos WHERE ID_PROYECTO=$id_proyecto";
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_array($resultado);

?>

    <!DOCTYPE html>
    <html>

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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="../css/estiloP.css">

    </head>


    <body>
        <div class="page-wrapper">
            <div class="page-content--bgf4">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop3 d-none d-lg-block">
                    <div class="section__content section__content--p35">
                        <div class="header3-wrap">
                            <div class="header__logo">
                                <a href="#">
                                    <!-- LOGO -->
                                    <img src="../img/logo.png" alt="" />
                                </a>
                            </div>
                            <div class="header__navbar">
                                <ul class="list-unstyled">
                                    <li class="has-sub">
                                        <a href="../Proyecto/Proyecto.php">
                                            <i class="fas fa-tachometer-alt"></i>Dashboard
                                            <span class="bot-line"></span>
                                        </a>
                                    </li>
                                    <li class="has-sub">
                                        <a href="#">
                                            <i class="fas fa-tachometer-alt"></i> Proyecto: <?php echo $fila["NOMBRE_PROYECTO"] ?>
                                            <span class="bot-line"></span>
                                        </a>
                                        <ul class="header3-sub-list list-unstyled">
                                            <li>
                                                <a href="../DimencionamientoE/Dimencionamiento.php">Dimencionamiento</a>
                                            </li>
                                            <li>
                                                <a href="../DimencionamientoE/Inversores.php">Inversores</a>
                                            </li>
                                            <li>
                                                <a href="../Volmaxymin/Corrientemax.php">Dato tecnico</a>
                                            </li>
                                            <li>
                                                <a href="../FVfinanciero/Financiero.php">Financiero</a>
                                            </li>
                                            <li>
                                                <a href="#">Consumo.php</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php if ($_SESSION['rol'] == 1) : ?>
                                        <li class="has-sub">
                                            <a href="#">
                                                <i class="fas fa-copy"></i>
                                                <span class="bot-line"></span> administrator
                                            </a>
                                            <ul class="header3-sub-list list-unstyled">
                                                <li>
                                                    <a href="../Login/signup.php">Register</a>
                                                </li>
                                                <li>
                                                    <a href="#">Password recovery</a>
                                                </li>
                                                <li>
                                                    <a href="#">Tabla Usuarios</a>
                                                </li>
                                                <li>
                                                    <a href="#">Tabla Inversores</a>
                                                </li>
                                                <li>
                                                    <a href="#">Tabla Modulos</a>
                                                </li>
                                                <li>
                                                    <a href="#">Tablas tarifas</a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="header__tool">
                                <div class="account-wrap">
                                    <div class="account-item account-item--style2 clearfix js-item-menu">
                                        <div class="image">
                                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['imagen']) . '" alt="Foto de perfil">'; ?>
                                            <a class="js-acc-btn" href="#"> <?php echo $_SESSION['nombre'] ?> </a>
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"> <?php echo $_SESSION['nombre'] ?> </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['imagen']) . '" alt="Foto de perfil">'; ?>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"> <?php echo $_SESSION['nombre'] ?> </a>
                                                    </h5>
                                                    <span class="email"> <?php echo $_SESSION['correo'] ?> </span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="../account/account.php">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-globe"></i>Language</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../sesion/desconec.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- END HEADER DESKTOP-->


                <!-- HEADER MOBILE-->
                <header class="header-mobile header-mobile-2 d-block d-lg-none">
                    <div class="header-mobile__bar">
                        <div class="container-fluid">
                            <div class="header-mobile-inner">
                                <a class="logo" href="index.html">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                                <button class="hamburger hamburger--slider" type="button">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar-mobile">
                        <div class="container-fluid">
                            <ul class="navbar-mobile__list list-unstyled">
                                <li class="has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="index.html">Dashboard 1</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-trophy"></i>
                                        <span class="bot-line"></span>Features</a>
                                </li>
                                <li class="has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-copy"></i> administrator </a>
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="../Login/signup.php">Register</a>
                                        </li>
                                        <li>
                                            <a href="#"> Password recovery </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>

                <div class="sub-header-mobile-2 d-block d-lg-none">
                    <div class="header__tool">
                        <div class="header-button-item has-noti js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
                                <div class="notifi__title">
                                    <p>You have 3 Notifications</p>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a email notification</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c2 img-cir img-40">
                                        <i class="zmdi zmdi-account-box"></i>
                                    </div>
                                    <div class="content">
                                        <p>Your account has been blocked</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c3 img-cir img-40">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a new file</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__footer">
                                    <a href="#">All notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="header-button-item js-item-menu">
                            <i class="zmdi zmdi-settings"></i>
                            <div class="setting-dropdown js-dropdown">
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-money-box"></i>Billing</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-globe"></i>Language</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-pin"></i>Location</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-email"></i>Email</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">john doe</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">john doe</a>
                                            </h5>
                                            <span class="email">johndoe@example.com</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="#">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END HEADER MOBILE -->

                <!-- PAGE CONTENT-->
                <div class="page-content">
                    <!-- BREADCRUMB-->
                    <section class="au-breadcrumb2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="au-breadcrumb-content">
                                        <div class="au-breadcrumb-left">
                                            <span class="au-breadcrumb-span">You are here:</span>
                                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                                <li class="list-inline-item active">
                                                    <a href="../Proyecto/Proyecto.php">Dashboard</a>
                                                </li>
                                                <li class="list-inline-item seprate">
                                                    <span>/</span>
                                                </li>
                                                <li class="list-inline-item"> Consumo </li>
                                            </ul>
                                        </div>
                                        <form class="au-form-icon--sm" action="" method="post">
                                            <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for datas &amp; reports...">
                                            <button class="au-btn--submit2" type="submit">
                                                <i class="zmdi zmdi-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- END BREADCRUMB-->
                    <div class="row col-md-12">
                        <!-- Parte 1 -->
                        <div class="col-lg-12">
                            <div class=""> <!-- aqui iba algo -->
                                <div class="au-card-title" style="background-image:url('../img/cfe.png');">
                                    <div class="bg-overlay"></div>
                                    
                                </div>
                                <div class="au-task js-list-load au-task--border">
                                    <div class="au-task-list js-scrollbar3">
                                        <div class="au-task__item au-task__item--danger bg-white">
                                            <div class="au-task__item-inner">
                                                <h5 class="task">
                                                    <div class="top-campaign">
                                                        <h3 class="title-3 m-b-30"> top campaigns </h3>
                                                        <div class="table-responsive">
                                                        <form method="POST" action="actualizar_datos.php">
    <table class="table table-top-campaign">
        <tbody>
            <tr>
                <td>Fecha</td>
                <td></td>
                <td>kwh</td>
                <td>kw</td>
                <td>fp</td>
                <td></td>
            </tr>
            <?php
            include("../BD/conec.php");
            $facturas = "SELECT * FROM facturas WHERE Id_proyecto = $id_proyecto";
            $resultado = mysqli_query($conexion, $facturas);

            while ($fila = mysqli_fetch_array($resultado)) {
                $id = $fila['id']; // Obtener el ID de la fila

                /* fechas */
                $meses = array(
                    1 => 'enero',
                    2 => 'febrero',
                    3 => 'marzo',
                    4 => 'abril',
                    5 => 'mayo',
                    6 => 'junio',
                    7 => 'julio',
                    8 => 'agosto',
                    9 => 'septiembre',
                    10 => 'octubre',
                    11 => 'noviembre',
                    12 => 'diciembre'
                );
                $fecha = $fila['mes'];
                $numero_mes = date('n', strtotime($fecha));
                $nombre_mes = $meses[$numero_mes];
                $anio = date('Y', strtotime($fecha));

                $kwh = $fila['kwh'];
                $kw = $fila['kw'];
                $fp = $fila['fp'];

                $mes2 = $fila['mes2'];

                $nombre_mes2 = ''; // Variable para almacenar el nombre del mes2

                if ($mes2 != '0000-00-00') {
                    $numero_mes2 = date('n', strtotime($mes2));
                    $nombre_mes2 = $meses[$numero_mes2];
                }
            ?>
                <tr>
                    <input type="hidden" name="id[]" value="<?php echo $id; ?>"> <!-- Campo oculto para el ID -->
                    <td><?php echo $nombre_mes . ' ' . $anio; ?></td>
                <?php if ($mes2 != '0000-00-00'): ?>
                    <td><?php echo $nombre_mes2 . ' ' . date('Y', strtotime($mes2)); ?></td>
                <?php else: ?>
                    <td></td> <!-- Espacio vacío si no hay fecha2 -->
                <?php endif; ?>
                    <td><input type="number" name="kwh[]" value="<?php echo $kwh; ?>" required></td>
                    <td><input type="number" name="kw[]" value="<?php echo $kw; ?>" required></td>
                    <td><input type="number" name="fp[]" value="<?php echo $fp; ?>" required></td>
                    <td></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<button class="au-btn-plus" type="submit"><i class="zmdi zmdi-plus"></i> </button>
</form>




                                                        </div>
                                                    </div>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Parte 2 -->
                    </div>

                    <!-- COPYRIGHT-->
                    <section class="p-t-60 p-b-20">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- END COPYRIGHT-->
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
        <script src="generador-fechas.js"></script>


    </body>

    </html>


<?php
} else {
    // Si no se encuentra el usuario en la base de datos
    echo "Error al obtener los datos del usuario.";
}
?>