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
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../css/toggle.css">
    <link id="theme" rel="stylesheet" href="../css/bootstrap.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <link id="style" rel="stylesheet" href="../css/style.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-...tu-codigo-de-integridad..." crossorigin="anonymous" />
    <script src="../js/day.js"></script>
    <link rel="stylesheet" href="../css/estiloP.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['correo'] ?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100 ">
                    <a href="../Proyecto/Proyecto.php" class="nav-item nav-link"><i class="bi bi-house-door me-2"></i>
                        Dashboard </a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <i
                                class="bi bi-folder-plus me-1"></i> Proyecto </a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="#" class="dropdown-item active"> Consumo </a>
                            <a href="../Dimencionamiento/Dimencionamiento.php" class="dropdown-item"> Dimencionamiento
                            </a>
                        </div>
                    </div>
                    <a href="../Volmaxymin/Corrientemax.php" class="nav-item nav-link"> <i
                            class="bi bi-clipboard me-1"></i> Dato Tecnico </a>
                </div>
            </nav>
        </div>

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
                                    <img class="rounded-circle" src="../img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="../img/user.png" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
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
                            <img class="rounded-circle me-lg-2" src="../img/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
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

            <!-- contenedor 2 -->
            <div class="container-fluid mt-4 pt-4 px-4">
                <div class="bg-secondary text-center rounded">
                    <div class="row g-4">
                        <!-- contenedor 2   -->
                        <form action="guardar-consumo.php" method="post">
                            <input type="hidden" name="ID_PROYECTO" value="<?php echo $idproyecto; ?>">
                            <div class="container-fluid pt-4 px-4">
                                <div class="row g-4 align-items-start">
                                    <div class="col-sm-6 col-xl-3">
                                        <div class="bg-secondary rounded d-flex flex-column align-items-end p-4">
                                            <label class="text-center" for="numeroServicio">Número de Servicio:</label>
                                            <input class="form-control border-0 rounded-pill my-2" type="text"
                                                pattern="[0-9]{12}" name="numeroServicio" id="numeroServicio" required
                                                placeholder="Ingrese 12 números">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-3">
                                        <div class="bg-secondary rounded d-flex flex-column align-items-end p-4">
                                            <label for="fechaFacturacion">Fecha de Facturación:</label>
                                            <input class="form-control border-0 rounded-pill  my-2" type="date"
                                                name="fechaFacturacion" id="fechaFacturacion" required><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-3">
                                        <div class="bg-secondary rounded d-flex flex-column align-items-end p-4">
                                            <label class="text-center" for="tipoTarifa">Tipo:</label>
                                            <select class="form-control border-0 rounded-pill  my-2" name="tipoTarifa"
                                                id="tipoTarifa" required onchange="generarFechas()">
                                                <option value="">Seleccione Mes/Bim</option>
                                                <option value="mensual">Mensual</option>
                                                <option value="bimensual">Bimensual</option>
                                            </select><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-3">
                                        <div class="bg-secondary rounded d-flex flex-column align-items-end p-4">
                                            <label for="tipoServicio">Tipo tarifa</label>
                                            <select class="form-control border-0 rounded-pill  my-2" name="tipoServicio"
                                                id="tipoServicio" required onchange="generarFechas()">
                                                <option value="">Seleccione alguno</option>
                                                <option value="1">1</option>
                                                <option value="1A">1A</option>
                                                <option value="1B">1B</option>
                                                <option value="1C">1C</option>
                                                <option value="1D">1D</option>
                                                <option value="1F">1F</option>
                                                <option value="DAC">DAC</option>
                                                <option value="PDBT">PDBT</option>
                                                <option value="GDBT">GDBT</option>
                                                <option value="RABT">RABT</option>
                                                <option value="GDMTO">GDMTO</option>
                                                <option value="GDMTH">GDMTH</option>
                                                <option value="RAMT">RAMT</option>
                                            </select><br>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="container-fluid pt-4 px-4">
                                <div class="row g-4">
                                    <div id="resultado"></div>
                                </div>
                            </div>

                            <input class="btn btn-info rounded-pill mt-4 m-2" type="submit" value="Guardar">
                        </form>

                    </div>
                </div>
            </div>
            <!-- contenedor 3 -->
            <div class="container">
    <div class="container-fluid mt-4 pt-4 px-4">
        <div class="bg-secondary text-center rounded">
            <div class="row g-4">
                <h4 class="mb-4">Número de Servicio</h4>

                <?php
                include("../BD/conec.php");

                // Obtener los IDs de proyecto de la sesión
                $id_proyecto = $_SESSION['ID_PROYECTO'];

                // Consulta SQL con agrupación y filtros
                $query1 = "SELECT no_servicio FROM facturas WHERE id_proyecto IN ($id_proyecto) GROUP BY no_servicio";
                $resultado1 = mysqli_query($conexion, $query1);

                while ($row = mysqli_fetch_assoc($resultado1)) {
                    $servicio = $row['no_servicio'];
                    
                ?>

                    <div class="col-sm-10 col-xl-10">
                        <form action="validar_consumo.php" method="post">
                            <input type="hidden" name="id_consumo" value="<?php echo $servicio; ?>">
                            <button class="btn btn-outline-primary w-100 m-2" type="submit"><?php echo $row['no_servicio']; ?></button>
                        </form>
                    </div>
                    <div class="col-sm-2 col-xl-2">
                        <form action="datos_consumo.php" method="post">
                            <input type="hidden" name="eliminar_id" value="<?php echo $row['no_servicio']; ?>">
                            <button class="btn btn-danger rounded-pill m-2" type="submit" onclick="eliminar('<?php echo $row['no_servicio'] ?>')"> <i class="bi bi-trash"></i></button>
                        </form>
                    </div>

                <?php
                }
                ?>
            </div>
            <script>
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success m-2',
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
                                    window.location.href = '#' + id;
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
                </script>
        </div>
    </div>
</div>

            
            <!-- fIN ontenedor 3 -->

        </div>

        <!-- Sidebar End -->

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
    <script src="generador-fechas.js"></script>

</body>

</html>


<?php
} else {
    // Si no se encuentra el usuario en la base de datos
    echo "Error al obtener los datos del usuario.";
}
?>