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

$n = $_SESSION['ID-SESSION'];

$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

$conn = mysqli_connect($servername, $username, $password, $database);

$consulta = "SELECT * FROM conductor WHERE cedula = $n";
$resultado = mysqli_query($conn, $consulta);
$cond = $resultado->fetch_assoc();

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

    <title>CargApp de Transportador</title>

    <!--=====================================
      PLUGINS DE JAVASCRIPT
      ======================================-->
      <!-- jQuery 3 -->
      <script src="files/bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

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
                                <h1 class="h4 text-gray-900 mb-4">Editar Perfil Transportador</h1>
                            </div>
                            <form class="user" method="post" action="modificar.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="name" name="name" 
                                            required data-error="Por favor ingresa tu nombre" value="<?php echo $cond['nombres']; ?>">   
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="lastname" name="apellidos" 
                                            required data-error="Por favor ingresa tu apellidos" value="<?php echo $cond['apellidos']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!--<div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" id="cedula" name="cedula" size="15" 
                                            placeholder="Número de documento de identidad" size="15" required data-error="Por favor ingresa cedula de ciudadania">
                                    </div>-->
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="telefono" name="telefono" size="15" 
                                            required data-error="Por favor ingresa tu # celular" value="<?php echo $cond['telefono']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" 
                                        placeholder="Ingrese su correo electrónico" data-error="Por favor ingresa tu correo electrónico" value="<?php echo $cond['correo']; ?>">
                                </div>
                                <!--<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <select class="form-control" id="selectdpto"  name="selectdpto" required data-error="Por favor seleccione un departamento" onchange="getval(this)">
                                                <option value="0" >seleccione un Departamento</option>
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
                                            <select class="form-control" id="selectmpio" name="selectmpio" required data-error="Por favor seleccione un municipio">
                                              <option value="0">seleccione su municipio</option>
                                              
                                            </select>
                                    </div>
                                </div>-->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <?php if($cond['ndpto'] == "0"){?>

                                            <input type="text" class="form-control form-control-user" id="ndpto" name="ndpto" placeholder="Ingrese el nombre del departamento"  required data-error="Por favor ingresa el nombre del departamento">  
                                        <?php }else { ?> 

                                            <input type="text" class="form-control form-control-user" id="ndpto" name="ndpto" required data-error="Por favor ingresa el nombre del departamento" value="<?php echo $cond['ndpto']; ?>">

                                        <?php } ?>                
                                    </div>
                                    <div class="col-sm-6">
                                        <?php if($cond['nmpio'] == "0"){?>
                                            <input type="text" class="form-control form-control-user" id="nmpio" name="nmpio" placeholder="ingrese el nombre del municipio" required data-error="Por favor ingresa el nombre del municipio">  
                                        <?php }else { ?> 

                                            <input type="text" class="form-control form-control-user" id="nmpio" name="nmpio" value="<?php echo $cond['nmpio']; ?>" required data-error="Por favor ingresa el nombre del municipio">

                                        <?php } ?>  
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php if($cond['direccion'] == "dcion"){?>
                                            <input type="text" class="form-control form-control-user"
                                            id="direccion" name="direccion" placeholder="Ingrese la Dirección" required data-error="Por favor ingresa tu dirección" >
                                    <?php }else { ?> 
                                            <input type="text" class="form-control form-control-user"
                                            id="direccion" name="direccion" required data-error="Por favor ingresa tu dirección"  value="<?php echo $cond['direccion']; ?>">
                                    <?php } ?>       
                                </div>
                                <div class="form-group">
                                    <?php if($cond['tpvehiculo'] == "tp"){?>
                                        <input type="text" class="form-control form-control-user" id="tpvehiculo" name="tpvehiculo" placeholder="Tipos de vehículos que conduces" required data-error="Por favor ingresa tipo de vehículo que conduces">
                                    <?php }else { ?> 
                                        <input type="text" class="form-control form-control-user" id="tpvehiculo" name="tpvehiculo" required data-error="Por favor ingresa tipo de vehículo que conduces"  value="<?php echo $cond['tpvehiculo']; ?>">
                                    <?php } ?>
                                </div> 


                                <div class="form-group">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="custom-control custom-checkbox">
                                            <?php if($cond['licencia'] == 1){?>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="licencia" name="licencia" value="" required data-error="seleccione el campo" checked disabled>Licencia Conducir
                                                </label>
                                            <?php }else { ?>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="licencia" name="licencia" value="" required data-error="seleccione el campo">Licencia Conducir
                                                </label>
                                            <?php } ?>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">  
                                        <div class="custom-control custom-checkbox">
                                            <?php if($cond['soat'] == 1){?>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="soat" name="soat" value="" required data-error="seleccione el campo" checked disabled>Seguro del Vehículo
                                                </label>
                                            <?php }else { ?>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="soat" name="soat" value="" required data-error="seleccione el campo">Seguro del Vehículo
                                                </label>
                                            <?php } ?>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="custom-control custom-checkbox">
                                            <?php if($cond['tecmeca'] == 1){?>
                                                <label class="form-check-label" required>
                                                   <input type="checkbox" class="form-check-input" id="tecmeca" name="tecmeca" value="" checked disabled>Técnico Mecánico
                                                </label>
                                            <?php }else { ?>
                                                <label class="form-check-label" required>
                                                   <input type="checkbox" class="form-check-input" id="tecmeca" name="tecmeca" value="" >Técnico Mecánico
                                                </label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!--<div class="col-sm-6">
                                        <label for="exampleFormControlFile1"></label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>-->
                                </div>
                                <div align="center">
                                    <button type="submit" class="btn btn-lg btn-primary">ACTUALIZAR</button>
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

    <?php
        echo'<script>
                function getval(sel)
                {
                    $dd= sel.value;
                    console.log($dd);
                    var x = sel.value;
                    console.log(x);

                    var id_dpto = $dd;
                    console.log(id_dpto);

                            $.ajax({
                                url: "select_ajax.php",
                                method: "POST",
                                data: {
                                    "id":id_dpto
                                },
                                success: function(respuesta){
                                    $("#selectmpio").attr("disabled", false);
                                    $("#selectmpio").html(respuesta);
                                }
                            })                                  
                }
        </script>';
    ?>

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
