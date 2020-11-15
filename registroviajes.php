<?php


session_name('CargApp');
session_start();
if($_SESSION['ID-SESSION'] == ""){
    echo'<script type="text/javascript">
                    alert("Debes iniciar sesion");
                        window.location.href="login.html";
                </script>';
}elseif($_SESSION['rol'] == 1){
    header('Location:/perfil.php');
}

$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

$conn = mysqli_connect($servername, $username, $password, $database);


if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="ofertas.html">
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
            <li class="nav-item">
                <a class="nav-link" href="perfiluser.php" data-target="#collapseTwo"
                    aria-expanded="true" >
                    <i class="fas fa-user fa-cog"></i>
                    <span>Editar perfil</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="ofertas.php"  data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-list"></i>
                    <span>Ofertas</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="registroviajes.php"  data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-list"></i>
                    <span>Ingresar Ofertas</span>
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
                <a class="nav-link " href="cerrarsesion.php" 
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Cerrar sesión</span>
                </a>
            </li>

            <!-- Nav Item - Charts --
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span></span></a>
            </li>

            <!-- Nav Item - Tables --
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span></span></a>
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

                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!--<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>-->
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Ingresar datos ofertas de viajes</h1>
                            </div>
                            <form class="user" method="post" action="registrarviaje.php">
                                 <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <select class="form-control" id="selectdptorigen" name="selectdptorigen" required data-error="Por favor seleccione un departamento">
                                              <option value="0">Seleccione su Departamento origen</option>
                                                <?php
                                                 $consulta = "SELECT * FROM departamento";
                                                 $resultado = mysqli_query($conn, $consulta);
                                                  while ($valores = $resultado->fetch_assoc()) {
                                                    echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
                                                  }
                                                ?>
                                            </select>
                                    </div>
                                    <div class="col-sm-6">
                                            <select class="form-control" id="selectmpiorigen" name="selectmpiorigen" required data-error="Por favor seleccione un municipio">
                                              <option value="0">Seleccione su Municipio origen</option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="direcciondestino" placeholder="Dirección de origen" name="direccionorigen" required data-error="Por favor ingrese su dirección">
                                </div>
                                 <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <select class="form-control" id="selectdptodestino" name="selectdptodestino" required data-error="Por favor seleccione un departamento">
                                              <option value="0">Seleccione su Departamento detino</option>
                                                <?php
                                                 $consulta = "SELECT * FROM departamento";
                                                 $resultado = mysqli_query($conn, $consulta);
                                                  while ($valores = $resultado->fetch_assoc()) {
                                                    echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
                                                  }
                                                ?>
                                            </select>
                                    </div>
                                    <div class="col-sm-6">
                                            <select class="form-control" id="selectmpiodestino" name="selectmpiodestino" required data-error="Por favor seleccione un municipio">
                                              <option value="0">Seleccione su Municipio</option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="direcciondestino" placeholder="Dirección destino" name="direcciondestino" required data-error="Por favor ingrese su dirección">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="tpcarga" name="tpcarga" 
                                            placeholder="Por favor ingrese el tipo de carga" required data-error="Por favor ingrese el tipo de carga">
                                    </div>
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" id="pesocarga" name="pesocarga"  
                                            placeholder="Ingrese el peso de la carga" required data-error="Por favor ingrese el peso de la carga">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control form-control-user" id="tn" name="tn" 
                                            placeholder="En toneladas" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="tpvehiculos" name="tpvehiculos" 
                                        placeholder="Ingrese los tipo de vehículo de carga que solicita">
                                    </div>
                                    <div class="col-sm-6 ">
                                        <input type="number" class="form-control form-control-user" id="vflete" name="vflete" 
                                        placeholder="Ingrese el valor del viaje">
                                    </div>
                                </div>
                                <div class="form-group row">
                                       <label for="example-date-input" class="col-sm-6">Fecha de carga</label>
                                  <div class="col-sm-6">
                                    <input class="form-control" type="date" value="2020-11-13" id="fechacarga" name="fechacarga" required data-error="Por favor elija una fecha">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="example-date-input" class="col-sm-6">Fecha de entrega</label>
                                  <div class="col-sm-6">
                                    <input class="form-control" type="date" value="2020-11-19" id="fechaentrega" name="fechaentrega" required data-error="Por favor elija una fecha">
                                  </div>
                                </div>
                           <hr>
                                <div align="center">
                                     <button type="submit" class="btn btn-lg btn-primary">REGISTRAR</button>
                                    <a href="ofertas.html"><input type="button" value="CANCELAR" class="btn btn-lg btn-danger "></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
    
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CArgApp 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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