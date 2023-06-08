<?php

include("../BD/conec.php");

session_start();


// Verificar si la sesión está activa
if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['correo'])) {
    // Redirigir a la página de inicio de sesión si no se ha iniciado sesión
    header("Location: ../index.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];


// Realizar una consulta en la base de datos utilizando el ID de usuario

$query = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
$resultado = mysqli_query($conexion, $query);

mysqli_error($conexion);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Obtener los datos del usuario
    $usuario = mysqli_fetch_assoc($resultado);

    // Acceder a los campos específicos del usuario

    $id_usuario = $_SESSION['id_usuario'];

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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

            <!-- Sidebar Start -->
            <div class="sidebar pe-4 pb-3">
                <nav class="navbar bg-secondary navbar-dark">
                    <a href="index.html" class="navbar-brand mx-4 mb-3">
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
                        <a href="#" class="nav-item nav-link active"><i class="bi bi-house-door me-2"></i> Dashboard </a>
                    </div>
                </nav>
            </div>

            <!-- Sidebar End -->

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
                <!-- crear proyect start -->
                <!-- crear proyect start -->
                <!-- crear proyect start -->
                <form method="POST" action="" id="formCrearProyecto">
                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                    <div class="mt-2 m-3">
                        <button value="enviar" name="enviar" class="btn btn-secondary rounded-pill m-2" onclick="guardarnombre(event)">
                            Crear Proyecto
                        </button>
                    </div>
                </form>

                <!-- crear proyect End-->
                <!-- Muestra proyecto star -->

                <?php
                include("../BD/conec.php");

                $consulta = "SELECT * FROM proyectos WHERE id_usuario = $id_usuario";
                $resultado = mysqli_query($conexion, $consulta);


                while ($fila = mysqli_fetch_array($resultado)) {


                    $id_proyecto = $fila['ID_PROYECTO']; // Obtener el ID_PROYECTO de la fila actual
                    // Guardar el ID_PROYECTO en la variable de sesión
                    /*    $_SESSION['ID_PROYECTO'] = $id_proyecto;  */
                    // Resto del código HTML
                ?>

                    <div class="container-fluid pt-4 px-4">
                        <div class=" text-center rounded">
                            <div class="row g-4">
                                <div class="col-sm-10 col-xl-10">
                                    <form action="validar_idproyecto.php" method="post">
                                        <input type="hidden" name="id_proyecto" value="<?php echo $id_proyecto; ?>">
                                        <button class="btn btn-outline-warning rounded-pill btn-lg btn-block w-100 m-1" type="submit"><?php echo $fila["NOMBRE_PROYECTO"]; ?></button>
                                    </form>
                                </div>
                                <div class="col-sm-2 col-xl-2">
                                    <button class="btn btn-danger rounded-pill m-2" onclick="eliminar('<?php echo $fila['ID_PROYECTO'] ?>')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php
                }
                ?>


                <!-- muestra end -->

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
                                    window.location.href = 'acciones/Eliminar.php?ID_PROYECTO=' + id;
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

                    function guardarnombre(event) {
                        event.preventDefault(); // Detener el envío del formulario
                        event.stopPropagation(); // Detener la propagación del evento

                        Swal.fire({
                            title: 'Inserta el nombre de tu proyecto',
                            input: 'text',
                            inputAttributes: {
                                autocapitalize: 'off'
                            },
                            showCancelButton: true,
                            confirmButtonText: 'Guardar',
                            cancelButtonText: 'Cancelar',
                            showLoaderOnConfirm: true,
                            preConfirm: (nombre) => {
                                if (nombre.trim() === '') {
                                    Swal.showValidationMessage('Por favor, ingresa un nombre válido');
                                } else {
                                    return nombre;
                                }
                            },
                            allowOutsideClick: () => !Swal.isLoading()
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const nombreProyecto = result.value;
                                const form = document.getElementById('formCrearProyecto');
                                form.action = 'guardarProyecto.php'; // Establecer la acción del formulario aquí
                                const inputNombre = document.createElement('input');
                                inputNombre.type = 'hidden';
                                inputNombre.name = 'nombreProyecto';
                                inputNombre.value = nombreProyecto;
                                form.appendChild(inputNombre);
                                form.submit();
                            }
                        });
                    }
                </script>


            </div>
        </div>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="../js/main.js"></script>

    </body>

    </html>

<?php
} else {
    // Si no se encuentra el usuario en la base de datos
    echo "Error al obtener los datos del usuario.";
}
?>