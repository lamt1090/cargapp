<?php 

$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if($conn == true){
	
}
}else{
	echo "todo salio mal";
}
//mysqli_close( $conn );
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CargApp team</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <!-- Icon -->
    <link rel="stylesheet" href="assets/fonts/line-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    
    <!-- Animate -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- syles galeria -->
    <link rel='stylesheet' href="assets/css/style.css"  type='text/css' />
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />

  </head>
  <body>


 <div>
    <div class="container">      
        <div class="row">
			<div class="col-md-12"><h1 style="text-align: center"> Lista de clientes</h1></div>
    		<div class="container">
				<div class="responsive-table">
		  			<?php if(!empty($clientes)): ?>
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					        <thead>
					            <tr>
					                <th style="width: 220px">Nombre</th>
					                <th>Teléfono</th>
					                <th>Email</th>
					                <th>Ciudad</th>
					                <th>Tipo de vehículo</th>
					                <th>Mensaje</th>
					            </tr>
					        </thead>
					        <tfoot>
					           <tr>
					                <th>Nombre</th>
					                <th>Teléfono</th>
					                <th>Email</th>
					                <th>Ciudad</th>
					                <th>Tipo de vehículo</th>
					                <th>Mensaje</th>
					               
					            </tr>
					        </tfoot>
					        <tbody>
					          <?php foreach($clientes as $cliente): 
					          	//echo var_dump($clientes);
					          ?>

					            <tr>
					                <td><?php echo $cliente['nombre']; ?></td>
					                <td><?php echo $cliente['telefono']; ?></td>
					                <td><?php echo $cliente['email']; ?></td>
					                <td><?php echo $cliente['ciudad']; ?></td>
					                <td><?php echo $cliente['tpvehiculo']; ?></td>
					                <td><?php echo $cliente['mensaje']; ?></td>
					            </tr>
					           <?php endforeach; ?>
					        </tbody>
					    </table>
		  			<?php endif; ?>  
  				</div>
  			</div>
  		</div>
  	</div>
</div>
  </body>
</html>


 