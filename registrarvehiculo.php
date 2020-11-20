<?php

session_name('CargApp');
session_start();
if($_SESSION['ID-SESSION'] == ""){
    echo'<script type="text/javascript">
                    alert("Debes iniciar sesion");
                        window.location.href="login.html";
                </script>';
}elseif($_SESSION['rol'] == 2){
    header('Location:/perfiluser.php');
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
                <a class="nav-link " href="ofertas.php"  data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-list"></i>
                    <span>Ver Ofertas</span>
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
                                <h1 class="h4 text-gray-900 mb-4">Registro del vehículo de carga</h1>
                            </div>
                            <form class="user" method="post" action="registrarvh.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="placa" name="placa" 
                                            placeholder="Ingrese la placa del vehículo" required data-error="Por favor ingrese la placa">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="marca" name="marca" 
                                            placeholder="Ingrese la marca del vehículo" required data-error="Por favor ingrese la marca del vehículo">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="modelo" name="modelo" size="15" 
                                            placeholder="Ingrese el modelo del vehículo" required data-error="Por favor ingrese el modelo">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="color" name="color"
                                            placeholder="ingrese el color del vehículo" required data-error="Por favor ingrese el color">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" id="cpdadmax" name="cpdadmax"
                                            placeholder="Ingrese la capacidad máxima del vehículo" required data-error="Por favor ingrese la capacidad del vehículo">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="tpvehiculo" name="tpvehiculo" 
                                            placeholder="Ingrese tipo de vehículo" required data-error="Por favor ingrese el tipo de vehículo">
                                    </div>
                                </div>
                                
                                <div align="center">
                                     <!--<button type="submit" class="btn btn-lg btn-primary">REGISTAR</button>
                                     <!-- Button to Open the Modal -->
                                      <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#myModal">
                                        REGISTRAR
                                      </button>

                                      <!-- The Modal -->
                                      <div class="modal fade" id="myModal">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                          
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                              <h3>Desea registrar este vehículo</h3>
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-lg btn-primary">ACEPTAR</button>
                                            </div>
                                            
                                          </div>
                                        </div>
                                      </div>
                                    <input type="button" value="CANCELAR" class="btn btn-lg btn-danger ">
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