<?php 

session_name('CargApp');
session_start();
if($_SESSION['ID-SESSION'] == ""){
    echo'<script type="text/javascript">
                    alert("Debes iniciar sesion");
                        window.location.href="login.html";
                </script>';
}elseif($_SESSION['rol'] == 2){
    header('Location:/ofertas.php');
}

$n = $_SESSION['ID-SESSION'];

$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

$conn = mysqli_connect($servername, $username, $password, $database);

if($conn == true){
    $consultaClientes = $conn->prepare("SELECT * FROM oferta WHERE apartado <> 'si'  ");
    $consultaClientes->execute();
    $clientes = $consultaClientes->get_result();
    //$clientes = $resultSet->fetch_All();

    if($clientes && $clientes->num_rows>0){
        $clientes->fetch_all(MYSQLI_ASSOC);
    }
}else{
    echo "todo salio mal";
}
//mysqli_close( $conn );


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CargApp</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="ofertasrecientes.php">
                <div class="sidebar-brand-text mx-3">
                    <img src="img/logo.png">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="perfil.php" data-target="#collapseTwo"
                    aria-expanded="true" >
                    <i class="fas fa-user fa-cog"></i>
                    <span>Editar perfil</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="registrarvehiculo.php" data-target="#collapseTwo"
                    aria-expanded="true" >
                    <i class="fas fa-user fa-cog"></i>
                    <span>Registrar Vehículos</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="vervehiculos.php" data-target="#collapseTwo"
                    aria-expanded="true" >
                    <i class="fas fa-user fa-cog"></i>
                    <span>Ver Vehículos</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="ofertasrecientes.php"  data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-list"></i>
                    <span>Ver Ofertas Disponibles</span>
                </a>
            </li>

             <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="verviajesapartados.php"  data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-list"></i>
                    <span>Ver Ofertas Aceptadas</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="cerrarsesion.php"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Cerrar sesión</span>
                </a>
            </li>

            <!-- Nav Item - Charts --
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables --
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->

        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Default checked -->

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombres']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="perfiluser.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="cerrarsesion.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <?php if(!empty($clientes)): ?>
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Lista de ofertas</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Descripción</th>
                                                <th>Departamento de salida</th>
                                                <th>Municipio de salida</th>
                                                <th>Dirección salida</th>
                                                <th>Departamento de destino</th>
                                                <th>Municipio de destino</th>
                                                <th>Dirección destino</th>
                                                <th>Fecha de salida</th>
                                                <th>Fecha de entrega</th>
                                                <th>Peso de la carga</th>
                                                <th>Tipo de vehículos</th>
                                                <th>Valor del flete</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php foreach($clientes as $cliente): 
                                                //echo var_dump($clientes);
                                            ?>
                                            <tr>
                                                <td><?php echo $cliente['tipocarga']; ?></td>
                                                <td><?php echo $cliente['ndptosl']; ?></td>
                                                <td><?php echo $cliente['nmpiosl']; ?></td>
                                                <td><?php echo $cliente['direccionsalida']; ?></td>
                                                <td><?php echo $cliente['ndptoet']; ?></td>
                                                <td><?php echo $cliente['nmpioet']; ?></td>
                                                <td><?php echo $cliente['direcciondestino']; ?></td>
                                                <td><?php echo $cliente['fechasalida']; ?></td>
                                                <td><?php echo $cliente['fechaentrega']; ?></td>
                                                <td><?php echo $cliente['pesocarga']; ?></td>
                                                <td><?php echo $cliente['tipovehiculo']; ?></td>
                                                <td><?php echo $cliente['valorflete']; ?></td>
                                                <td><a class="btn btn-primary" href="postularse.php?id=<?php echo $cliente['id']; ?>">POSTULARSE</a></td>
                                            </tr>
                                           <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>  
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CargApp 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal" tabindex="-1" id="postular">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">TEAM CARGAPP</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Por ser de los primeros transportadores en utilizar nuestra aplicación podrás postularse a los viajes sin ningún costo durante 1 mes. </p>
                            <p>Cuando pase el mes al postularse debes cancelar un costo de $50.000 pesos por viaje.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                            <button type="button" class="btn btn-primary">ACEPTAR</button>
                        </div>
                </div>
            </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Desea cerrar la sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Vuelve pronto <?php echo $_SESSION['nombres']; ?>.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="cerrarsesion.php">ACEPTAR</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>