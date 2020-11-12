<?php

include 'conexion.php';

//aqui llegan los campos del formulario
$name = $_POST['name'];

$phone = $_POST['phone'];

$email = $_POST['email'];

$ciudad = $_POST['ciudad'];

$tpvehiculo = $_POST['tpvehiculo'];

$mensaje = $_POST['mensaje'];


$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if($conn == true){
	
	$sql = "INSERT INTO adoptantes_tempranos (nombre, telefono, email, ciudad, tpvehiculo, mensaje) VALUES ('$name', $phone, '$email', '$ciudad', '$tpvehiculo', '$mensaje')";
		//var_dump(mysql_query($conn, $sql)
		if (mysqli_query($conn, $sql)) {
			header('Location:https://cargappcucuta.000webhostapp.com/');
		}else{
			echo "error al insertar en la BD";
		}
		echo $sql;
}else{
	echo "todo salio mal";
}

mysqli_close( $conn );


?>