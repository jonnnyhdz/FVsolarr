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


// Realizar una consulta en la base de datos utilizando el ID de usuario
$query = "SELECT * FROM usuarios WHERE id = $id_usuario";
$resultado = mysqli_query($conexion, $query);

if ($resultado && mysqli_num_rows($resultado) > 0) {

    // Obtener los datos del usuario
    /* $usuario = mysqli_fetch_assoc($resultado);
 */
    // Acceder a los campos específicos del usuario

    $_SESSION['ID_PROYECTO'] = $id_proyecto;


    // Mostrar los datos del usuario dentro del contenido HTML
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


    <?php
    include("../BD/conec.php"); //Conexión a la Base de Datos//


    $id_modulosescojidos = 5;


    $consulta = "SELECT * FROM proyectos WHERE ID_PROYECTO=$id_proyecto";
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_array($resultado);

    $id_seleccionado = $fila['ID_MFV'];
    $modulos =  $fila['NumerosdeModulos'];
    $AREADISPONIBLES =  $fila['Areatotal'];
    $voc =  $fila['VOCMAX'];
    $VMPMIN =  $fila['VMPMIN'];
    $consulta2 = "SELECT * FROM ModulosFV WHERE ID_MFV = '$id_seleccionado'";
    $resultado2 = mysqli_query($conexion, $consulta2);
    $fila2 = mysqli_fetch_array($resultado2);
    $WATT =  $fila2['Watts'];
    $Potenciapanel = $WATT / 1000;
    $PpicoFVfinal = $modulos * $Potenciapanel;
    $Area_módulo = $fila2['Area_módulo'];
    $Short_Circuit = $fila2['Short_Circuit'];
    $impp = $fila2['Impp'];

    /* area de modulosFV/AREADISPONIBLES */

    $Nmodulosi =  $AREADISPONIBLES / $Area_módulo;
    $areatotalSI = $Nmodulosi * $Area_módulo;
    $PpicoFv = $Nmodulosi * $Potenciapanel;
    echo "<script> var idProyecto = $id_proyecto;</script>";

    ?>

    <body onload="cambiarColor()">

        <div class="page-wrapper page-content--bgf6">

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
                                            <a href="#">Dato tecnico</a>
                                        </li>
                                        <li>
                                            <a href="../FVfinanciero/Financiero.php">Financiero</a>
                                        </li>
                                        <li>
                                            <a href="../DimencionamientoE/validation/V_consumoE.php">Consumo.php</a>
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
                                            <li class="list-inline-item active">
                                                <a href="../DimencionamientoE/Dimencionamiento.php"> Dimencionamiento </a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item"> Datos tecnicos </li>
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

                <!-- contenedor 1 -->

                <div class="row col-md-12">
                    <!-- parte 1 -->
                    <div class="col-lg-4">
                        <div class="au-card recent-report">
                            <div class="au-card-inner">
                                <div class="section">
                                    <div class="section-content">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Numero de módulos</td>
                                                    <td id="num-modulos"><?php echo $fila["NumerosdeModulos"]; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>Area total final para instalar módulos FV</td>
                                                    <td id="area-total"><?php echo $fila["Areatotal"] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Potencia Pico FV final</td>
                                                    <td id="potencia-pico"><?php echo $PpicoFVfinal ?></td>
                                                    <div id="potencia" value="<?php echo $PpicoFVfinal; ?>"></div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- tabla 1 -->

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <td>Potencia Pico</td>
                                            <td id="potencia-pico2"> <?php echo $PpicoFVfinal ?> </td>
                                        </tr>
                                        <tr>
                                            <th> Opciones </th>
                                            <th> Potencia Maxima </th>
                                            <th> No. Máximo de cadenas en paralelo en corto circuito</th>
                                            <th>No. Máximo de cadenas en paralelo en operación nominal </th>
                                            <th>No. Maximo de modulos en serie </th>
                                            <th>No. Minimo de modulos en serie </th>
                                            <th> Vocmax en serie </th>

                                            <th> Vmpmin en serie </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include("../BD/conec.php");

                                        $total2 = 0;

                                        $consulta = "SELECT escogido_mfv.ID_ESCOGIDO, escogido_mfv.ID_INVERSORES, inversores.Marca, inversores.Modelo, inversores.Max_potencia_FV_recomendada, inversores.Max_corriente_cortocircuito_rastreador_MPPT,inversores.Max_corriente_entrada_rastreador_MPPT, inversores.Voltaje_max_MPPT, inversores.Voltaje_min_MPPT FROM escogido_mfv
                                        JOIN inversores ON escogido_mfv.ID_INVERSORES = inversores.id_inversor
                                        WHERE escogido_mfv.ID_PROYECTO = '$id_proyecto'";
                                        $resultado = mysqli_query($conexion, $consulta);
                                        $num_inversores = mysqli_num_rows($resultado);

                                        $modulosmax1 = 0;

                                        while ($fila = mysqli_fetch_array($resultado)) {
                                            $total = $fila['Max_potencia_FV_recomendada'];


                                            $potenciaRemasterisado = $total / 1000;

                                            $total2 = $potenciaRemasterisado + $total2;

                                            $Max_corriente_cortocircuito_rastreador_MPPT = $fila['Max_corriente_cortocircuito_rastreador_MPPT'];

                                            $Voltaje_max_MPPT = $fila['Voltaje_max_MPPT'];

                                            $Voltaje_min_MPPT = $fila['Voltaje_min_MPPT'];

                                            $NoMáxcadenasparalelocircuito = $Max_corriente_cortocircuito_rastreador_MPPT / $Short_Circuit;
                                            $NoMáxcadenasparalelocircuitoFormateado = number_format($NoMáxcadenasparalelocircuito, 2);

                                            $EntradaMPPT = $fila['Max_corriente_entrada_rastreador_MPPT'];

                                            $NoMáximocadenasparalelooperaciónnominal = $EntradaMPPT / $impp;
                                            $NoMáximocadenasparalelooperaciónnominalFormateado = number_format($NoMáximocadenasparalelooperaciónnominal, 2);

                                            $modulosmax = intval($Voltaje_max_MPPT / $voc);

                                            $modulosmin = intval($Voltaje_min_MPPT / $VMPMIN);

                                            $datoDivididoMax = $modulosmax * $voc;

                                            $datoDivididoMin = $modulosmin * $VMPMIN;

                                            /*  fechas */
                                            if ($modulosmax1 == 0) {
                                                $modulosmax1 = $modulosmax; // Almacenar el primer valor de kw
                                            }

                                        ?>
                                            <tr>
                                                <td><?php echo $fila['Marca'] ?><?php echo $fila['Modelo'] ?></td>
                                                <td><?php echo $potenciaRemasterisado ?></td>
                                                <td> <?php echo $NoMáxcadenasparalelocircuitoFormateado ?> Cadenas </td>
                                                <td> <?php echo $NoMáximocadenasparalelooperaciónnominalFormateado ?> Cadenas </td>
                                                <td> <?php echo $modulosmax ?> Modulos </td>
                                                <td> <?php echo $modulosmin ?> Modulos </td>
                                                <td> <?php echo $datoDivididoMax ?> V </td>
                                                <td> <?php echo $datoDivididoMin ?> V </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <td> Total DE KW pico</td>
                                            <td id="Kwpico"> <?php echo $total2 ?> </td>
                                            <div id="Kwpico2" value="<?php echo $total2; ?>"></div>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tabal 2 -->

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning" id="tabla-arreglos">
                                    <?php
                                    include("../BD/conec.php");

                                    $inversores = array();

                                    $consulta = "SELECT escogido_mfv.ID_ESCOGIDO, escogido_mfv.ID_INVERSORES, inversores.Marca, inversores.Modelo, inversores.No_rastreadores_MPPT, inversores.Max_corriente_cortocircuito_rastreador_MPPT, inversores.Max_corriente_entrada_rastreador_MPPT FROM escogido_mfv
                                    JOIN inversores ON escogido_mfv.ID_INVERSORES = inversores.id_inversor
                                    WHERE escogido_mfv.ID_PROYECTO = '$id_proyecto'";
                                    $resultado = mysqli_query($conexion, $consulta);

                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        $idInversor = $fila['ID_INVERSORES'];
                                        if (!isset($inversores[$idInversor])) {
                                            $inversores[$idInversor] = array(
                                                'ID_INVERSORES' => $fila['ID_INVERSORES'],
                                                'Marca' => $fila['Marca'],
                                                'Modelo' => $fila['Modelo'],
                                                'MPPT' => $fila['No_rastreadores_MPPT'],
                                            );
                                        }
                                    }
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Concepto</th>
                                            <?php foreach ($inversores as $inversor) { ?>
                                                <th><?php echo $inversor['Marca'] . ' ' . $inversor['Modelo']; ?></th>
                                            <?php } ?>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $campos = array('Marca', 'Modelo', 'MPPT');

                                        foreach ($campos as $campo) { ?>
                                            <tr>
                                                <td><?php echo $campo . ' del inversor'; ?></td>
                                                <?php foreach ($inversores as $inversor) { ?>
                                                    <td><?php echo $inversor[$campo]; ?></td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>

                                        <!-- fin -->

                                        <tr>
                                            <th>Cadena ideal</th>
                                            <?php foreach ($inversores as $inversor) { ?>
                                                <td></td>
                                            <?php } ?>
                                        </tr>

                                        <?php
                                        $camposSolucion = array('Solucion a instalar MPPT 1', 'Solucion a instalar MPPT 2', 'Solucion a instalar MPPT 3', 'Solucion a instalar MPPT 4');
                                        foreach ($camposSolucion as $campo) { ?>
                                            <tr>
                                                <td><?php echo $campo; ?></td>
                                                <?php foreach ($inversores as $inversor) { ?>
                                                    <td><input type="number" name="solucion-mppt[]" class="solucion-mppt form-control border-0 rounded-pill  my-2" value="<?php echo $modulosmax1 ?>" data-inversor="<?php echo $inversor['ID_INVERSORES']; ?>" /></td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>

                                        <tr>
                                            <th>Total Modulos por inversor</th>
                                            <?php foreach ($inversores as $inversor) { ?>
                                                <td class="text-primary" id="total-modulos-inversor-<?php echo $inversor['ID_INVERSORES']; ?>"></td>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tabla 3  -->
                <div class="container-fluid mt-4 pt-4 px-4">
                    <div class="bg-secondary text-center rounded">
                        <div class="row g-4">
                            <div class="col-sm-12 col-xl-12">
                                <div class="bg-secondary rounded h-100 p-1">

                                    <?php
                                    include("../BD/conec.php");

                                    $inversores = array();

                                    $consulta = "SELECT escogido_mfv.ID_ESCOGIDO, escogido_mfv.ID_INVERSORES, inversores.Marca, inversores.Modelo, inversores.No_rastreadores_MPPT, inversores.Max_corriente_cortocircuito_rastreador_MPPT, inversores.Max_corriente_entrada_rastreador_MPPT FROM escogido_mfv
JOIN inversores ON escogido_mfv.ID_INVERSORES = inversores.id_inversor
WHERE escogido_mfv.ID_PROYECTO = '$id_proyecto'";
                                    $resultado = mysqli_query($conexion, $consulta);

                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        $idInversor = $fila['ID_INVERSORES'];
                                        if (!isset($inversores[$idInversor])) {
                                            $inversores[$idInversor] = array(
                                                'ID_INVERSORES' => $fila['ID_INVERSORES'],
                                                'Marca' => $fila['Marca'],
                                                'Modelo' => $fila['Modelo'],
                                                'No_rastreadores_MPPT' => $fila['No_rastreadores_MPPT'],
                                                'voc' => $voc, // Agregar voc al array
                                            );
                                        }
                                    }
                                    ?>

                                    <div class="container-fluid mt-4 pt-4 px-4">
                                        <div class="bg-secondary text-center rounded">
                                            <div class="row g-4">
                                                <div class="col-sm-12 col-xl-12">
                                                    <div class="bg-secondary rounded h-100 p-1">
                                                        <?php
                                                        foreach ($inversores as $inversor) {
                                                        ?>
                                                            <div class="container-fluid mt-4 pt-4 px-4 m-2">
                                                                <div class="bg-secondary text-center rounded">
                                                                    <div class="row g-4">
                                                                        <div class="col-sm-12 col-xl-12">
                                                                            <div class="bg-secondary rounded h-100 p-1">
                                                                                <table id="myTable">
                                                                                    <tr>
                                                                                        <th colspan="6">Inversor: <?php echo $inversor['Marca'] . ' ' . $inversor['Modelo']; ?></th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th> Circuito FV </th>
                                                                                        <th> Num. de modulos FV </th>
                                                                                        <th>V.Maximo</th>
                                                                                        <th>Potencia</th>
                                                                                        <th>Corriente</th>
                                                                                    </tr>
                                                                                    <?php
                                                                                    $contador_modulos = $inversor['No_rastreadores_MPPT'] * 2; // Calcular el número de circuitos

                                                                                    for ($i = 1; $i <= $contador_modulos; $i++) {
                                                                                        $modulosmax1 = $modulosmax1; // Asigna el valor inicial deseado
                                                                                    ?>
                                                                                        <tr>
                                                                                            <td>Circuito <?php echo $i; ?></td>
                                                                                            <td>
                                                                                                <input value="<?php echo $modulosmax1; ?>" type="number" class="vmaximo-input form-control border-0 rounded-pill my-2 input-sm" onchange="calculateTotal(this)">
                                                                                            </td>
                                                                                            <td class="total-vmax"> ....</td>
                                                                                            <td class="potencia-input"> .... </td>
                                                                                            <td class="corriente-input"> ....</td>
                                                                                        </tr>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>

                                                        <div id="voc" data-value="<?php echo $voc; ?>"></div>
                                                        <div id="Potenciapanel" data-value="<?php echo $Potenciapanel; ?>"></div>
                                                        <div id="Circuit" data-value="<?php echo $Short_Circuit; ?>"></div>
                                                        <script>
                                                            var voc = parseFloat(document.getElementById("voc").getAttribute("data-value"));
                                                            var Potenciapanel = parseFloat(document.getElementById("Potenciapanel").getAttribute("data-value"));
                                                            var Circuit = parseFloat(document.getElementById("Circuit").getAttribute("data-value"));

                                                            function calculateTotal(input) {
                                                                var tableRow = input.closest('tr');
                                                                var numModulos = parseFloat(input.value);
                                                                var vmax = numModulos * voc;
                                                                var potencia = Potenciapanel * numModulos;
                                                                tableRow.querySelector('.total-vmax').textContent = vmax.toFixed(2);
                                                                tableRow.querySelector('.potencia-input').textContent = potencia.toFixed(2);
                                                                tableRow.querySelector('.corriente-input').textContent = Circuit.toFixed(2);
                                                                calculateRowTotal(tableRow.closest('table'));
                                                            }

                                                            // Llama a calculateTotal para calcular los valores iniciales al cargar la página
                                                            var inputs = document.querySelectorAll('.vmaximo-input');
                                                            inputs.forEach(function(input) {
                                                                calculateTotal(input);
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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



        <!-- Javascript  hojas-->
        <script src="../js/main2.js"></script>
        <script src="../js/main.js"></script>
        <script src="Resultados.js"></script>
        <script src="ajaxcalculo.js"> </script>
        <script src="guardar.js"></script>
        <script src="../Volmaxymin/calculos/Tabla2.js"></script>
        <script src="../cokkies/cokkies.js"></script>
    </body>

    </html>

<?php
} else {
    // Si no se encuentra el usuario en la base de datos
    echo "Error al obtener los datos del usuario.";
}
?>