<?php

include 'conexion.php';

$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

$conn = mysqli_connect($servername, $username, $password, $database);

if (isset($_POST['licencia']) && isset($_POST['soat']) && isset($_POST['tecmeca'])) {
	$licencia = 1;
	$soat = 1;
	$tecmeca = 1;
}

$name = $_POST['name'];
$apellidos = $_POST['apellidos'];
$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$selectdpto = $_POST['selectdpto'];
$selectmpio = $_POST['selectmpio'];
$direccion = $_POST['direccion'];
$tpvehiculo = $_POST['tpvehiculo'];

if ($conn == true) {
	
	$sql = "UPDATE conductor SET nombres = '$name', apellidos = '$apellidos', telefono = '$telefono', departamento = $selectdpto, municipio = $selectmpio, direccion = '$direccion', correo = '$email', tpvehiculo = '$tpvehiculo', licencia = 1, soat = 1, tecmeca = 1, rol = 1 WHERE cedula = $cedula";

	if (mysqli_query($conn, $sql)) {

		echo'<script type="text/javascript">
    				alert("Datos Guardados exitosamnete");
    					window.location.href="perfil.html";
   			</script>';

				//header('Location:https://cargappcucuta.000webhostapp.com/perfil.html');

	}else{

				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}else{
	echo "no hay conexión";
}



?>