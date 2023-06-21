<?php

include("../BD/conec.php");

session_start();


$id_usuario = $_SESSION['id_usuario'];



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

    $idproyecto = $_SESSION['ID_PROYECTO'];
    $_SESSION['ID_PROYECTO'] = $idproyecto;

    // Mostrar los datos del usuario dentro del contenido HTML
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <title> FVSolar</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">


        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="../css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/estiloP.css">

        <link rel="stylesheet" href="../css/toggle.css">
        <link id="theme" rel="stylesheet" href="../css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link id="style" rel="stylesheet" href="../css/style.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...tu-codigo-de-integridad..." crossorigin="anonymous" />
        <script src="../js/day.js"></script>

        <!-- cokkies  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"></script>


    </head>


    <?php
    include("../BD/conec.php"); //Conexión a la Base de Datos//



    $id_modulosescojidos = 3;


    $consulta = "SELECT * FROM proyectos WHERE ID_PROYECTO=$idproyecto";
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_array($resultado);

    $id_seleccionado = $fila['ID_MFV'];

    $contador_modulos = $fila['CmodulosVolt'];




    /* SI  */
    $modulos =  $fila['NumerosdeModulos'];

    $AREADISPONIBLES =  $fila['areadisponible'];


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
    echo "<script> var idProyecto = $idproyecto;</script>";

    $opcionSeleccionada = $fila['opcionSeleccionada'];


    ?>

    <body onload="cambiarColor()">

        <div class="container-fluid position-relative d-flex p-0">
            <!-- spinner star -->


            <!-- Sidebar Start -->
            <div class="sidebar pe-4 pb-3">
                <nav class="navbar bg-secondary navbar-dark">
                    <a href="#" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary"> <i class="bi bi-sun-fill"></i> FVSolar </h3>
                    </a>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <img class="rounded-circle" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0"><?php echo $_SESSION['correo'] ?></h6>
                            <span>Admin</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100 ">
                        <a href="../Proyecto/Proyecto.php" class="nav-item nav-link"><i class="bi bi-house-door me-2"></i> Dashboard </a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <i class="bi bi-folder-plus me-1"></i> Proyecto </a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="../Consumo/Consumo.php" class="dropdown-item"> Consumo </a>
                                <a href="../Dimencionamiento/Dimencionamiento.php" class="dropdown-item"> Dimencionamiento </a>
                            </div>
                        </div>
                        <a href="#" class="nav-item nav-link active"> <i class="bi bi-clipboard me-1"></i> Dato Tecnico </a>
                    </div>
                </nav>
            </div>

            <!-- Sidebar End -->

            <div class="content">

                <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                    </a>
                    <a href="#" class="sidebar-toggler flex-shrink-0">
                        <i class="fa fa-bars"></i>
                    </a>
                    <form class="d-none d-md-flex ms-4">
                        <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                    </form>
                    <div class="navbar-nav align-items-center ms-auto">
                        <div class="navbar-nav align-items-center ms-auto">
                            <label class="toggle">
                                <input type="checkbox" id="toggleSwitch" onchange="changeTheme()" />
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fa fa-envelope me-lg-2"></i>
                                <span class="d-none d-lg-inline-flex">Message</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                                <a href="#" class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                        <div class="ms-2">
                                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle" src="../img/user.png" alt="" style="width: 40px; height: 40px;">
                                        <div class="ms-2">
                                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                        <div class="ms-2">
                                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                            <small>15 minutes ago</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item text-center">See all message</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fa fa-bell me-lg-2"></i>
                                <span class="d-none d-lg-inline-flex">Notificatin</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">Profile updated</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">New user added</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">Password changed</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item text-center">See all notifications</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img class="rounded-circle me-lg-2" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['correo'] ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                                <a href="#" class="dropdown-item">My Profile</a>
                                <a href="#" class="dropdown-item">Settings</a>
                                <a href="../sesion/desconec.php" class="dropdown-item">Log Out</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Navbar End -->

                <!-- Termina contenido -->
                <!-- contenedor 2  -->
                <div class="container-fluid mt-4 pt-4 px-4">
                    <div id="hola" value="<?php echo $Nmodulosi; ?>"></div>
                    <div id="area" value="<?php echo $areatotalSI; ?>"></div>
                    <div id="PpicoFv" value="<?php echo $PpicoFv; ?>"></div>
                    <div id="dato" value="<?php echo $id_seleccionado ?>"></div>
                    <span id="idproyecto" data-idproyecto="<?php echo $idproyecto; ?>"></span>
                    <div class="bg-secondary text-center rounded">
                        <div class="row g-4">
                            <div class="col-sm-12 col-xl-6">
                                <div class="bg-secondary text-center rounded p-4">
                                    <table class=" table mx-auto">
                                        <thead>
                                            <tr>
                                                <th>LIMITAR</th>
                                                <th>
                                                    <select id="opciones" onchange="cambiarColor(); guardarSeleccion()" name="opcionSeleccionada">
                                                        <option value="no">No</option>
                                                        <option value="si">Si</option>
                                                    </select>

                                                </th>
                                            </tr>
                                        </thead>
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
                            <div class="col-sm-12 col-xl-6">
                                <div class="bg-secondary text-center rounded p-4">
                                    <table class="container">
                                        <tr>
                                            <th>Resultado</th>
                                        </tr>
                                        <tr>
                                            <td id="tabla2"> </td>
                                        </tr>
                                    </table>
                                    <div class="bg-secondary text-center rounded p-4">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <label> Area disponible de instalacion </label>
                                            <input type="number" class="form-control border-0 rounded-pill  my-2" id="area-insta" oninput="guardar2()" value="<?php echo $fila["areadisponible"] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- contenedor 3  -->

                <div class="container-fluid mt-4 pt-4 px-4">
                    <div class="bg-secondary text-center rounded">
                        <div class="row g-4">
                            <div class="col-sm-12 col-xl-12">
                                <div class=" table-responsiv bg-secondary rounded h-100 p-4">
                                    <table class="table">
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
                                        <?php
                                        include("../BD/conec.php");

                                        $total2 = 0;

                                        $consulta = "SELECT escogido_mfv.ID_ESCOGIDO, escogido_mfv.ID_INVERSORES, inversores.Marca, inversores.Modelo, inversores.Max_potencia_FV_recomendada, inversores.Max_corriente_cortocircuito_rastreador_MPPT,inversores.Max_corriente_entrada_rastreador_MPPT, inversores.Voltaje_max_MPPT, inversores.Voltaje_min_MPPT FROM escogido_mfv
                                        JOIN inversores ON escogido_mfv.ID_INVERSORES = inversores.id_inversor
                                        WHERE escogido_mfv.ID_PROYECTO = '$idproyecto'";
                                        $resultado = mysqli_query($conexion, $consulta);
                                        $num_inversores = mysqli_num_rows($resultado);
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
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- contenedor 4 -->

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
                                     WHERE escogido_mfv.ID_PROYECTO = '$idproyecto'";
                                    $resultado = mysqli_query($conexion, $consulta);

                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        $idInversor = $fila['ID_INVERSORES'];
                                        if (!isset($inversores[$idInversor])) {
                                            $inversores[$idInversor] = array(
                                                'ID_INVERSORES' => $fila['ID_INVERSORES'],
                                                'Marca' => $fila['Marca'],
                                                'Modelo' => $fila['Modelo'],
                                                'No_rastreadores_MPPT' => $fila['No_rastreadores_MPPT'],
                                            );
                                        }
                                    }

                                    echo '<table class="table-bordered" id="tabla-arreglos">';

                                    echo '<tr>';
                                    echo '<th>Concepto</th>';
                                    foreach ($inversores as $inversor) {
                                        echo '<th>' . $inversor['Marca'] . ' ' . $inversor['Modelo'] . '</th>';
                                    }
                                    echo '</tr>';

                                    $campos = array('Marca', 'Modelo', 'No_rastreadores_MPPT');



                                    foreach ($campos as $campo) {
                                        echo '<tr>';
                                        echo '<td>' . $campo . ' del inversor</td>';
                                        foreach ($inversores as $inversor) {
                                            echo '<td>' . $inversor[$campo] . '</td>';
                                        }
                                        echo '</tr>';
                                    }


                                    /* fin  */

                                    echo '<tr>';
                                    echo '<th> Cadena ideal </th>';
                                    foreach ($inversores as $inversor) {
                                        echo '<td></td>';
                                    }
                                    echo '</tr>';

                                    $camposSolucion = array('Solucion a instalar MPPT 1', 'Solucion a instalar MPPT 2', 'Solucion a instalar MPPT 3', 'Solucion a instalar MPPT 4');
                                    foreach ($camposSolucion as $campo) {
                                        echo '<tr>';
                                        echo '<td>' . $campo . '</td>';
                                        foreach ($inversores as $inversor) {
                                            echo '<td><input type="number" name="solucion-mppt[]" class="solucion-mppt form-control border-0 rounded-pill  my-2" value="" data-inversor="' . $inversor['ID_INVERSORES'] . '" /></td>';
                                        }
                                        echo '</tr>';
                                    }

                                    echo '<tr>';
                                    echo '<th>Total Modulos por inversor</th>';
                                    foreach ($inversores as $inversor) {
                                        echo '<td class="text-primary" id="total-modulos-inversor-' . $inversor['ID_INVERSORES'] . '"></td>';
                                    }
                                    echo '</tr>';

                                    echo '</table>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empieza contenido -->

                <div class="container-fluid mt-4 pt-4 px-4">
                    <div class="bg-secondary text-center rounded">
                        <div class="row g-4">
                            <div class="container-fluid pt-4 px-4">
                                <div class="row g-4">
                                    <?php
                                    include("../BD/conec.php");
                                    $consulta = "SELECT * FROM proyectos WHERE ID_PROYECTO=$idproyecto";
                                    $resultado = mysqli_query($conexion, $consulta);
                                    $fila = mysqli_fetch_array($resultado); { ?>
                                        <div class="col-sm-12 col-xl-6">
                                            <div class="bg-secondary text-center rounded p-4">
                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                    <label> Cantidad de Sring </label>
                                                    <input type="number" class="form-control border-0 rounded-pill  my-2" id="nummodulos" oninput="guardar2()" value="<?php echo $fila["CmodulosVolt"] ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-xl-6">
                                            <div class="bg-secondary text-center rounded p-4">
                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                    <label> Cantidad de cadenas </label>
                                                    <input type="number" class="form-control border-0 rounded-pill  my-2" id="cancadenas" oninput="guardar2()" value="<?php echo  $fila["CcadenasVolt"] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- contenedor ultimo -->
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
                    WHERE escogido_mfv.ID_PROYECTO = '$idproyecto'";
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
                                                'contador_modulos' => $contador_modulos, // Agregar contador_modulos al array
                                            );
                                        }
                                    }

                                    foreach ($inversores as $inversor) {
                                        echo '<div class="container-fluid mt-4 pt-4 px-4 m-2">';
                                        echo '<div class="bg-secondary text-center rounded">';
                                        echo '<div class="row g-4">';
                                        echo '<div class="col-sm-12 col-xl-12">';
                                        echo '<div class="bg-secondary rounded h-100 p-1">';
                                        echo '<table id="myTable">';

                                        echo '<tr>';
                                        echo '<th colspan="6">Inversor: ' . $inversor['Marca'] . ' ' . $inversor['Modelo'] . '</th>';
                                        echo '</tr>';

                                        echo '<tr>';
                                        echo '<th> Circuito FV </th>';
                                        echo '<th> Num. de modulos FV </th>';
                                        echo '<th>V.Maximo</th>';
                                        echo '<th>Potencia</th>';
                                        echo '<th>Corriente</th>';
                                        echo '</tr>';

                                        $contador_modulos = $inversor['contador_modulos']; // Obtener el valor de contador_modulos del array

                                        for ($i = 1; $i <= $contador_modulos; $i++) {
                                            echo '<tr>';
                                            echo '<td>Circuito ' . $i . '</td>';
                                            echo '<td><input type="number"  class="vmaximo-input form-control border-0 rounded-pill my-2 input-sm" onchange="calculateTotal(this)"></td>';
                                            echo '<td class="total-vmax"> ....</td>';
                                            echo '<td class="potencia-input "> .... </td>';
                                            echo '<td class="corriente-input"> ....</td>';
                                            echo '</tr>';
                                        }

                                        echo '<tr>';
                                        echo '</tr>';

                                        echo '</table>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }

                                    ?>

                                    <div id="voc" value="<?php echo $voc; ?>"></div> 
                                    <div id="Potenciapanel" value="<?php echo $Potenciapanel; ?>"></div> 
                                    <div id="Circuit" value="<?php echo $Short_Circuit; ?>"></div>
                                    <script>
                                
                                        var voc = parseFloat(document.getElementById("voc").getAttribute("value"));
                                        var Potenciapanel = parseFloat(document.getElementById("Potenciapanel").getAttribute("value"));
                                        var Circuit = parseFloat(document.getElementById("Circuit").getAttribute("value"));

                                        function calculateTotal(input) {
                                            var tableRow = input.closest('tr');
                                            var numModulos = parseFloat(tableRow.querySelector('.vmaximo-input').value);
                                            var vmax = numModulos * voc;
                                            var potencia = Potenciapanel * numModulos;
                                            tableRow.querySelector('.total-vmax').textContent = vmax.toFixed(2);
                                            tableRow.querySelector('.potencia-input').textContent = potencia.toFixed(2);
                                            tableRow.querySelector('.corriente-input').textContent = Circuit.toFixed(2);
                                            calculateRowTotal(tableRow.closest('table'));
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- fun -->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-secondary rounded-top p-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 text-center text-sm-start">
                                &copy; <a href="#">Robles Ingeniero </a>, All Right Reserved.
                            </div>
                            <div class="col-12 col-sm-6 text-center text-sm-end">

                                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                                <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>



        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../lib/chart/chart.min.js"></script>
        <script src="../lib/easing/easing.min.js"></script>
        <script src="../lib/waypoints/waypoints.min.js"></script>
        <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="../lib/tempusdominus/js/moment.min.js"></script>
        <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <!-- Javascript  hojas-->
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