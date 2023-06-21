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
                                        <a href="#">
                                            <i class="fas fa-tachometer-alt"></i>Dashboard
                                            <span class="bot-line"></span>
                                        </a>
                                        <ul class="header3-sub-list list-unstyled">
                                            <li>
                                                <a href="../Proyecto/Proyecto.php">Dashboard</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a href="#">
                                            <i class="fas fa-tachometer-alt"></i> Proyecto
                                            <span class="bot-line"></span>
                                        </a>
                                        <ul class="header3-sub-list list-unstyled">
                                            <li>
                                                <a href="VistaC.php">Consumo</a>
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
                                                    <a href="#">User</a>
                                                </li>
                                                <li>
                                                    <a href="#">Inversores</a>
                                                </li>
                                                <li>
                                                    <a href="#">Modulos</a>
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
                        <div class="col-lg-6">
                            <div class=""> <!-- aqui iba algo -->
                                <div class="au-card-title" style="background-image:url('../img/cfe.png');">
                                    <div class="bg-overlay"></div>
                                    <button class="au-btn-plus" onclick="window.location.href='consumo.php'">
                                        <i class="zmdi zmdi-plus"></i>
                                    </button>
                                </div>
                                <div class="au-task js-list-load au-task--border">
                                    <div class="au-task-list js-scrollbar3">
                                        <div class="au-task__item au-task__item--danger bg-white">
                                            <div class="au-task__item-inner">
                                                <h5 class="task">
                                                    <a href="#"> IMPORTANTE: Los datos proporcionados deben ser correctos , ya que estos datos nos permitiran realizar los calculos correspondientes </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="au-task__item au-task__item--warning bg-white">
                                            <div class="au-task__item-inner">
                                                <h5 class="task">
                                                    <a href="#"> IMPORTANTE: Puedes tener varios facturas en el mismo proyecto </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="au-task__item au-task__item--success bg-white">
                                            <div class="au-task__item-inner">
                                                <h5 class="task">
                                                    <a href="https://app.cfe.mx/aplicaciones/CCFE/SolicitudesCFE/Solicitudes/ConsultaTuReciboLuzGmx.aspx">OBSERVACION: "Si no tiene eso datos. Te recomendaría hacer clic en este enlace para obtener consulta." </a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Parte 2 -->
                        <div class="col-lg-6">
                            <!-- DATA TABLE-->
                            <section class="">
                                <div class="container">
                                    <div class="">
                                        <div class="">
                                            <div class="table-responsive table-responsive-data2">
                                                <table class="table table-data2 table-earning">

                                                    <?php
                                                    include("../BD/conec.php");

                                                    // Obtener los IDs de proyecto de la sesión
                                                    $id_proyecto = $_SESSION['ID_PROYECTO'];

                                                    // Consulta SQL con agrupación y filtros
                                                    $query1 = "SELECT no_servicio FROM facturas WHERE id_proyecto IN ($id_proyecto) GROUP BY no_servicio";
                                                    $resultado1 = mysqli_query($conexion, $query1);

                                                    while ($row = mysqli_fetch_assoc($resultado1)) {
                                                        $servicio = $row['no_servicio'];
                                                        $nombre = "ID: ";

                                                    ?>
                                                        <tbody>
                                                            <tr class="tr-shadow">
                                                                <td>
                                                                    <form action="validar_consumo.php" method="post">
                                                                        <input type="hidden" name="id_consumo" value="<?php echo $servicio; ?>">
                                                                        <button type="submit"><?php echo $nombre, $row["no_servicio"]; ?></button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <span class="block-email"> 2018-09-29 05:57 </span>
                                                                </td>
                                                                <td>
                                                                    <div class="table-data-feature">
                                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                            <i class="zmdi zmdi-edit"></i>
                                                                        </button>
                                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="eliminar('<?php echo $row['no_servicio']; ?>')">
                                                                            <i class="zmdi zmdi-delete"></i>
                                                                        </button>
                                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                                            <i class="zmdi zmdi-more"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- END DATA TABLE-->
                        </div>
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