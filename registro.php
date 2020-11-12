<?php

include 'conexion.php';

$servername = "localhost";
$database = "cargapp";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);


$cedula = $_POST['cedula'];

$name = $_POST['name'];

$apellidos = $_POST['apellidos'];

$telefono = $_POST['telefono'];

$email = $_POST['email'];

$rol = $_POST['selectrol'];
	
$usuario = $_POST['usuario'];

$password = $_POST['password'];


if ($_POST['selectrol'] == 1) {

	$sql1 = "INSERT INTO usuario (usuario, contraseña, clienteid, conductorid) VALUES ('$usuario', '$password', 000, $cedula)";

	var_dump($sql1);
	
	$sql = "INSERT INTO condutor (cedula, nombres, apellidos, telefono, departamento, municipio, direccion, correo, tpvehiculo, licencia, soat, tecmeca, rol) VALUES ($cedula, '$name', '$apellidos', $telefono, 'dpto', 'mpio', 'dcion' $email', 'tp', 1, 1, 1, $rol)";

		var_dump($sql); 

		if (mysqli_query($conn, $sql)) {
			header('Location:/perfil.html');
		}else{
			echo "error al insertar en la BD";
		}

		mysqli_close( $conn );

}else{
	echo "generador de carga".$_POST['selectrol'];
}






?>