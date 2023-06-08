<?php

include("../BD/conec.php");

session_start();


$id_usuario = $_SESSION['id_usuario'];

$NunServicio =  $_SESSION['id_consumo'];


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

        <link rel="stylesheet" href="../css/toggle.css">
        <link id="theme" rel="stylesheet" href="../css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link id="style" rel="stylesheet" href="../css/style.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...tu-codigo-de-integridad..." crossorigin="anonymous" />
        <script src="../js/day.js"></script>
        <link rel="stylesheet" href="../css/estiloP.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body onload="guardar()">

        <div class="container-fluid position-relative d-flex p-0">
            <!-- Spinner Start -->
            <div id="spinner" class="show  position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->

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
                                <a href="#" class="dropdown-item active"> Dimencionamiento </a>
                            </div>
                        </div>
                        <a href="../Volmaxymin/Corrientemax.php" class="nav-item nav-link"> <i class="bi bi-clipboard me-1"></i> Dato Tecnico </a>
                    </div>
                </nav>
            </div>

            <!-- Sidebar End -->

            <div class="content">
                <!-- nav start -->

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

                <div class="container-fluid mt-4 pt-4 px-4">
                    <div class="bg-secondary text-center rounded">
                        <div class="row g-4">
                            <?php
                            include("../BD/conec.php"); //Conexión a la Base de Datos//

                            echo "<script> var idProyecto = $idproyecto;</script>";
                            echo "<script> var NunServicio = " . json_encode($NunServicio) . ";</script>";
                            $consulta = "SELECT * FROM proyectos WHERE ID_PROYECTO=$idproyecto";
                            $resultado = mysqli_query($conexion, $consulta);
                            $fila = mysqli_fetch_array($resultado);


                            ?>


                            <!-- Sales Chart Start -->

                            <div class="col-sm-12 col-xl-12">
                                <div class="bg-secondary text-center rounded p-4">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            <h5 class="mb-4"> Detalles del proyecto</h5>
                                            <div class="form-group">
                                                <label for="nombreProyecto">Nombre del proyecto</label>
                                                <input type="text" class="form-control border-0 rounded-pill my-2" id="proyecto" name="nameproyecto" oninput="guardar()" value="<?php echo $fila["NOMBRE_PROYECTO"] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="hsp">HSP</label>
                                                <input class="form-control border-0 rounded-pill  my-2 " type="number" id="ior" name="hsp" placeholder="Min" oninput="guardar()" value="<?php echo $fila["HSP"] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="temp">Temp. Ambiente (Min/Max)</label>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="number" class="form-control border-0 rounded-pill  my-2" id="min" name="min" oninput="guardar()" value="<?php echo $fila["TEMP_MIN"] ?>">
                                                    </div>
                                                    <div class="col">
                                                        <input type="number" class="form-control border-0 rounded-pill  my-2" id="max" name="max" oninput="guardar()" value="<?php echo $fila["TEMP_MAX"] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ubicacion">Ubicación</label>
                                                <input type="text" class="form-control border-0 rounded-pill  my-2" name="ubicacion" value="<?php echo $fila["Ubicacion"] ?>" id="ubi" oninput="guardar()">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Sales Chart End -->
                        </div>
                    </div>
                </div>

                <!-- contenedor 2 -->
                <div class="container-fluid mt-4 pt-4 px-4">
                    <div class="bg-secondary text-center rounded">
                        <div class="row g-4">
                            <!-- contenedor 2   -->
                            <div class="col-sm-12 col-xl-6">
                                <div class="bg-secondary text-center rounded p-4">
                                    <h5 class="mb-4"> Modulos FV </h5>
                                    <label class="" for="cliente"> Marca/Modelo </label>
                                    <br>
                                    <br>
                                    <select class="form-control border-0 rounded-pill" name="cat" aria-label="Floating label select example" onclick="guardar();">
                                        <?php
                                        include('../BD/conec.php');
                                        $consulta2 = "SELECT * FROM ModulosFV";
                                        $resultado2 = mysqli_query($conexion, $consulta2);
                                        while ($fila2 = mysqli_fetch_array($resultado2)) {
                                            $selected = ($fila2["ID_MFV"] == $fila["ID_MFV"]) ? "selected" : "";
                                        ?>
                                            <option value="<?php echo $fila2["ID_MFV"]; ?>" <?php echo $selected; ?>>
                                                <?php echo $fila2["Marca"]; ?>
                                                <span style="margin: 0 5px;"> -- </span>
                                                <?php echo $fila2["Modelo"]; ?>
                                                <span style="margin: 0 5px;"> -- </span>
                                                <?php echo $fila2["Watts"]; ?> Watts
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <!-- llamado ajax -->
                                    <div class="mt-3" id="mostrar_mensaje"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6">
                                <div class="bg-secondary text-center rounded p-4">
                                    <h2 class="encabezados"> Potencia Kw </h2>
                                    <div id="mostrar_mensaje2"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- start content 3 -->
                <div class="container-fluid mt-4  pt-4 px-4">
                    <div class="bg-secondary text-center rounded">
                        <div class="row g-4">
                            <h1 class="text-center"> Inversores </h1>
                            <form method="POST" action="GuardarD/guardar.php">
                                <input type="hidden" name="idproyecto" value="<?php echo $idproyecto; ?>">
                                <div>
                                    <div class="container-fluid pt-4 px-4">
                                        <div class="row g-4">
                                            <div class="col-sm-12 col-xl-6">
                                                <div class="bg-secondary text-center rounded p-4">
                                                    <label for="cantidad"> Cantidad de Inversores Totales: </label>
                                                    <select class="form-control border-0 rounded-pill  my-2" id="cantidad" name="cantidad_inversores" onclick="OInversor()">
                                                        <?php for ($i = 0; $i <= 10; $i++) { ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xl-6">
                                                <div class="bg-secondary text-center rounded p-4">
                                                    <label for="inversores">Inversores:</label>
                                                    <select  class="form-control border-0 rounded-pill  my-2" id="inversores" name="inversores" onclick="OInversor()">
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
                                        <div class="bg-secondary text-center rounded">
                                            <div class="row g-4">
                                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                                    <div id="marca_<?php echo $i; ?>" class="marca" style="display: none;">
                                                        <div class="container-fluid pt-4 px-4">
                                                            <div class="row g-4">
                                                                <div class="col-sm-12 col-xl-6">
                                                                    <div class="bg-secondary text-center rounded p-4">
                                                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                                                            <label for="marca_<?php echo $i; ?>">Marca/Modelo de Inversor <?php echo $i; ?>:</label>
                                                                            <select  class="form-control border-0 rounded-pill  my-2" name="marca_<?php echo $i; ?>" id="marca_<?php echo $i; ?>_modelo" class="">
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
                                                                    <div class="bg-secondary text-center rounded p-4">
                                                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                                                            <label class="mt-3" for="marca_<?php echo $i; ?>">Cantidad de Inversor <?php echo $i; ?>:</label>
                                                                            <input   class="form-control border-0 rounded-pill  my-2" class="form-control " type="number" name="cantidad_<?php echo $i; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
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

                <!-- cont 4 -->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4"> Inversores en el proyecto </h6>
                        <button class="btn btn-warning rounded-pill m-2 mb-2" onclick="limitar()"> Limitar </button>
                        <div class="table-responsive">
                            <form action="">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Marca</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $contador = 1;
                                        include('../BD/conec.php');
                                        $consulta = "SELECT escogido_mfv.ID_ESCOGIDO, escogido_mfv.ID_INVERSORES,escogido_mfv.cantidad, inversores.Marca,inversores.Modelo
                                            FROM escogido_mfv
                                            JOIN inversores ON escogido_mfv.ID_INVERSORES = inversores.id_inversor
                                            WHERE ID_PROYECTO = '$idproyecto'";


                                        /* SELECT escogido_mfv.ID_ESCOGIDO, escogido_mfv.ID_INVERSORES, inversores.Marca, inversores.Modelo, inversores.Max_potencia_FV_recomendada FROM escogido_mfv
                                            JOIN inversores ON escogido_mfv.ID_INVERSORES = inversores.id_inversor */

                                        $resultado = mysqli_query($conexion, $consulta);
                                        while ($fila = mysqli_fetch_array($resultado)) {


                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $contador ?> </th>
                                                <td><?php echo $fila['Marca'] ?><?php echo $fila['Modelo'] ?></td>
                                                <td><?php echo $fila["cantidad"] ?></td>
                                                <td><button type="button" class="btn btn-sm btn-outline-Warning " onclick="eliminar('<?php echo $fila['ID_ESCOGIDO'] ?>')"> <i class="bi bi-trash"></i></button></td>
                                            </tr>
                                        <?php $contador++;
                                        } ?>
                                    </tbody>
                                </table>
                                <script>
                                    const swalWithBootstrapButtons = Swal.mixin({
                                        customClass: {
                                            confirmButton: 'btn btn-success m-3',
                                            cancelButton: 'btn btn-danger'
                                        },
                                        buttonsStyling: false
                                    });

                                    function eliminar(id) {
                                        swalWithBootstrapButtons.fire({
                                            title: '¿Estás seguro?',
                                            text: "¡No podrás revertir esto!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonText: 'Sí, eliminarlo',
                                            cancelButtonText: 'No, cancelar',
                                            reverseButtons: true,
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                swalWithBootstrapButtons.fire(
                                                    'Deleted!',
                                                    'Your file has been deleted.',
                                                    'success'
                                                );
                                                // Retrasar la redirección después de 2 segundos
                                                setTimeout(function() {
                                                    window.location.href = 'GuardarD/Eliminar.php?ID_ESCOGIDO=' + id;
                                                }, 2000);
                                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                                swalWithBootstrapButtons.fire(
                                                    'Cancelado',
                                                    'Tu archivo está seguro :)',
                                                    'error'
                                                );
                                            }
                                        });
                                    }


                                    function limitar() {

                                        Swal.fire({
                                            title: 'Estas seguro?',
                                            text: "Te estas redirigiendo a Dato Tecnico!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: ' Si, Limitar!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                Swal.fire(
                                                    'Redirigiendo......!',
                                                    'Espero un momento',
                                                    'success'

                                                )

                                                setTimeout(function() {
                                                    window.location.href = '../Volmaxymin/Corrientemax.php'
                                                }, 2000);


                                            }
                                        })

                                    }
                                </script>
                            </form>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


        <!-- Javascript  hojas-->
        <script src="../js/main.js"></script>
        <script src="OVR.js"></script>
        <script src="Oinversor.js"></script>


    </body>

    </html>

<?php
} else {
    // Si no se encuentra el usuario en la base de datos
    echo "Error al obtener los datos del usuario.";
}
?>