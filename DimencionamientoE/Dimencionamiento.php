<?php
include("../BD/conec.php");
session_start();
$id_usuario = $_SESSION['id_usuario'];

if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['correo'])) {
    header("Location: ../index.php");
    exit();
}
$query = "SELECT * FROM usuarios WHERE id = $id_usuario";
$resultado = mysqli_query($conexion, $query);
if ($resultado && mysqli_num_rows($resultado) > 0) {

    $idproyecto = $_SESSION['ID_PROYECTO'];
    $_SESSION['ID_PROYECTO'] = $idproyecto;
?>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="../css/estiloP.css">

    </head>

    <body onload="guardar()">
        <?php
        include("../BD/conec.php");
        echo "<script> var idProyecto = $idproyecto;</script>";
        $consulta = "SELECT * FROM proyectos WHERE ID_PROYECTO=$idproyecto";
        $resultado = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_array($resultado);
        ?>
        <!-- Inicio del cuadro  -->
        <div class="page-wrapper">
            <div class="page-content--bgf4">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop3 d-none d-lg-block">
                    <div class="section__content section__content--p35">
                        <div class="header3-wrap">
                            <div class="header__logo">
                                <a href="#">
                                    <!-- LOGO -->
                                    <img src="#" alt="logo" />
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
                                                <a href="#">Dimencionamiento</a>
                                            </li>
                                            <li>
                                                <a href="Inversores.php">Inversores</a>
                                            </li>
                                            <li>
                                                <a href="../Volmaxymin/Corrientemax.php">Dato tecnico</a>
                                            </li>
                                            <li>
                                                <a href="../FVfinanciero/Financiero.php">Financiero</a>
                                            </li>
                                            <li>
                                                <a href="validation/V_consumoE.php">Consumo.php</a>
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
                                    <img src="#" alt="CoolAdmin" />
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
                                    <img src="#" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">john doe</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="#" alt="John Doe" />
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
                                                <li class="list-inline-item"> Dimencionamiento </li>
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
                    <div class="row col-12">
                        <!-- parte 1 -->
                        <div class="col-lg-4">
                            <div class="au-card">
                                <div class="au-card-inner">
                                    <div class="">
                                        <div class="">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1"> Name proyect </label>
                                                <input type="text" class="form-control" id="proyecto" name="nameproyecto" oninput="guardar()" value="<?php echo $fila["NOMBRE_PROYECTO"] ?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1"> Peak Solar Hour (HSP) </label>
                                                <input type="number" step="0.01" class="form-control cc-name valid" id="ior" name="hsp" placeholder="Min" oninput="guardar()" value="<?php echo $fila["HSP"] ?>">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1"> location </label>
                                                <input type="text" class="form-control" name="ubicacion" value="<?php echo $fila["Ubicacion"] ?>" id="ubi" oninput="guardar()">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="au-card mb-4">
                                <div class="au-card-inner">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label"> temperature </label>
                                                <div class="chart-statis mr-0">
                                                    <span class="index incre">
                                                        <i class="zmdi zmdi-long-arrow-up"></i>
                                                        <input type="number" id="max" name="max" class="col col-sm-9" oninput="guardar()" value="<?php echo $fila["TEMP_MAX"] ?>"></span>
                                                    <span class="label">maximum</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label "> temperature </label>
                                            <div class="input-group">
                                                <div class="chart-statis mr-0">
                                                    <span class="index decre">
                                                        <i class="zmdi zmdi-long-arrow-down"></i>
                                                        <input type="number" id="min" name="min" class="col col-sm-9" oninput="guardar()" value="<?php echo $fila["TEMP_MIN"] ?>"> </span>
                                                    <span class="label">Minimum</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="au-card">
                                <div class="au-card-inner ">
                                    <div class="">
                                        <div class="">
                                            <div class="form-group">
                                                <h5> Modulos Fotovoltaicos: </h5>
                                                <select class="form-control mb-1" name="cat" aria-label="Floating label select example" onclick="guardar();">

                                                    <?php
                                                    include('../BD/conec.php');
                                                    $consulta2 = "SELECT * FROM ModulosFV";
                                                    $resultado2 = mysqli_query($conexion, $consulta2);
                                                    while ($fila2 = mysqli_fetch_array($resultado2)) {
                                                        $selected = ($fila2["ID_MFV"] == $fila["ID_MFV"]) ? "selected" : "";
                                                    ?>

                                                        <option value="<?php echo $fila2["ID_MFV"]; ?>" <?php echo $selected; ?>>
                                                            <?php echo $fila2["Marca"]; ?>
                                                            <span style="margin: 0 5px;">--</span>
                                                            <?php echo $fila2["Modelo"]; ?>
                                                            <span style="margin: 0 5px;">--</span>
                                                            <?php echo $fila2["Watts"]; ?> Watts
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="au-card ">
                                <div class="au-card-inner">
                                    <div class="mb-2">
                                        <div class="mt-3" id="mostrar_mensaje"></div>
                                    </div>
                                    <div class="">
                                        <div id="mostrar_mensaje2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php 
                    $_SESSION['_incorrecto'] = 1;
                    if ($_SESSION['_incorrecto'] = $_SESSION['_incorrecto'] ?? 0 == 1) : ?>
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show m-3 mr-2">
                            <span class="badge badge-pill badge-danger"> Sugerencia </span>
                            <span id="resultado"></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="row col-md-12 mt-4">
                        <!-- parte 1 -->

                        <div class="col-lg-4">
                            <div class="au-card recent-report mr-0">
                                <div class="au-card-inner">
                                    <div class="section">
                                        <div class="section-content">
                                            <form id="formularioEnvio" onsubmit="enviarDatos(event)">
                                                <label for="inputNumModulos">Número de Módulos:</label>
                                                <input type="number" step="0.01" id="inputNumModulos" required placeholder="Modulos">
                                                <br><br>
                                                <label for="inputAreaTotal">Área Total para instalar módulos FV:</label>
                                                <input type="number" step="0.01" id="inputAreaTotal" required placeholder="mts^2">
                                                <br><br>
                                                <label for="inputPotenciaPico">Potencia Pico FV:</label>
                                                <input type="number" step="0.01" id="inputPotenciaPico" required placeholder="Kw">
                                                <br><br>
                                                <button type="submit">Enviar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="au-card recent-report">
                                <div class="au-card-inner">
                                    <div class="section">
                                        <div class="section-content">
                                            <!-- Inicio del cuadro  -->
                                            <div class="section">
                                                <h2>Limitar</h2>
                                                <div class="section-content">

                                                    <form>
                                                        <label for="seleccion">Limitar:</label>
                                                        <select id="seleccion" onchange="mostrarDatos()">
                                                            <option value="no">No</option>
                                                            <option value="si">Sí</option>
                                                            <option value="sinCambios">Sin cambios</option>
                                                        </select>
                                                        <p id="mensajeModificacion"></p>
                                                        <br><br>
                                                        <label for="numModulos">Número de Módulos:</label>
                                                        <input type="number" id="numModulos" readonly oninput="actualizarDatos()">
                                                        <br><br>
                                                        <label for="areaTotal">Área Total para instalar módulos FV:</label>
                                                        <input type="number" id="areaTotal" readonly oninput="actualizarDatos()">
                                                        <br><br>
                                                        <label for="potenciaPico">Potencia Pico FV:</label>
                                                        <input type="number" id="potenciaPico" readonly oninput="actualizarDatos()">
                                                    </form>
                                                    <p id="datos"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="au-card mb-6">
                                <form method="POST" action="actions/guardar.php">
                                    <input type="hidden" name="idproyecto" value="<?php echo $idproyecto; ?>">
                                    <div>
                                        <div class="container-fluid pt-4 px-4">
                                            <div class="row g-4">
                                                <div class="col-sm-12 col-xl-6">
                                                    <div class=" text-center rounded p-4">
                                                        <label class="control-label mb-" for="cantidad"> Cantidad de Inversores Totales: </label>
                                                        <select class="form-control " id="cantidad" name="cantidad_inversores" onclick="OInversor()">
                                                            <?php for ($i = 0; $i <= 10; $i++) { ?>
                                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-xl-6">
                                                    <div class=" text-center rounded p-4">
                                                        <label class="control-label mb-2" for="inversores">Inversores:</label>
                                                        <select class="form-control" id="inversores" name="inversores" onclick="OInversor()">
                                                            <option value="diferentes">Diferentes</option>
                                                            <option value="mismo">Los mismos</option>
                                                            <button value="guardar">Guardar</button>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ultimo contenedor -->
                                        <div class="container-fluid  pt-4 px-4">
                                            <div class="text-center rounded" style="<?php echo ($i > 1) ? 'max-height: 300px; overflow-y: auto;' : ''; ?>">
                                                <div class="row g-4">
                                                    <?php for ($i = 1; $i <= 10; $i++) { ?>
                                                        <div id="marca_<?php echo $i; ?>" class="marca" style="display: none;">
                                                            <div class="container-fluid pt-4 px-4">
                                                                <div class="row">
                                                                    <table class="table">
                                                                        <div class="col-sm-12 col-xl-6">
                                                                            <div class="text-center rounded">
                                                                                <div class="d-flex align-items-center justify-content-between">
                                                                                    <label class="control-label mt-2" for="marca_<?php echo $i; ?>"> Inversor <?php echo $i; ?>:</label>
                                                                                    <select class="form-control" name="marca_<?php echo $i; ?>" id="marca_<?php echo $i; ?>_modelo" class="">
                                                                                        <?php
                                                                                        include('../BD/conec.php');
                                                                                        $consulta2 = "SELECT * FROM inversores";
                                                                                        $resultado2 = mysqli_query($conexion, $consulta2);
                                                                                        while ($fila2 = mysqli_fetch_array($resultado2)) {
                                                                                        ?>
                                                                                            <option value="<?php echo $fila2["id_inversor"] ?>">
                                                                                                <?php echo $fila2["Marca"] ?>
                                                                                                <?php echo $fila2["Modelo"] ?>
                                                                                            </option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xl-6">
                                                                            <div class="text-center rounded">
                                                                                <div class="d-flex align-items-center justify-content-between">
                                                                                    <label class="control-label mt-2" for="marca_<?php echo $i; ?>">Cantidad de Inversor <?php echo $i; ?>:</label>
                                                                                    <input class="form-control" type="number" name="cantidad_<?php echo $i; ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- fin contenedor  -->
                                    </div>
                                    <!-- Agrega un botón para enviar los valores seleccionados mediante una petición AJAX -->
                                    <button class="btn btn-info rounded-pill mt-4 m-2" value="guardar">Guardar</button>
                                </form>
                            </div>
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
        <!-- <script src="../vendor/jquery-3.2.1.min.js"></script> -->
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
        <script src="main.js"></script>
        <script src="ajax/sugerencia.js"></script>
    </body>

    </html>

<?php
} else {
    // Si no se encuentra el usuario en la base de datos
    echo "Error al obtener los datos del usuario.";
}
?>