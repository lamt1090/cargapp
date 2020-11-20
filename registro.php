<?php

//include 'conexion.php';

$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

$conn = mysqli_connect($servername, $username, $password, $database);


$cedula = $_POST['cedula'];

$name = $_POST['name'];

$apellidos = $_POST['apellidos'];

$telefono = $_POST['telefono'];

$email = $_POST['email'];

$rol = $_POST['selectrol'];
	
$usuario = $_POST['usuario'];

$password = $_POST['password'];

$selecttpdocu = $_POST['selecttpdocu'];

$politicadatos = $_POST['politicadatos'];


if ($_POST['selectrol'] == 1) {

	$sql = "INSERT INTO conductor (cedula, nombres, apellidos, telefono, departamento, ndpto, municipio, nmpio, direccion, correo, tpvehiculo, licencia, soat, tecmeca, rol, politicadatos, cantviajes) VALUES ($cedula, '$name', '$apellidos', '$telefono', 0, '0', 0, '0', 'dcion', '$email', 'tp', 0, 0, 0, $rol, 'si', 0)";

		//var_dump($conn,$sql); 

		if (mysqli_query($conn, $sql)) {

			$sql1 = "INSERT INTO usuariocond (usuario, contraseña, conductorid) VALUES ('$usuario', '$password', $cedula)";

			if (mysqli_query($conn, $sql1)) {
				header('Location:https://cargappcucuta.000webhostapp.com/perfil.php');
			}else{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}else{
			echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);		}

		mysqli_close( $conn );

}else{

	$sql2 = "INSERT INTO cliente (cedula, nit, razonsocial, nombres, apellidos, direccion, departamento, ndpto, municipio, nmpio, telefono, correo, rol, politicadatos) VALUES ($cedula, 'nit', '0000', '$name', '$apellidos', 'dcion', 0, '0', 0, '0', '$telefono', '$email', $rol, 'si')";


		if (mysqli_query($conn, $sql2)) {

			$sql3 = "INSERT INTO usuario (usuario, contraseña, clienteid) VALUES ('$usuario', '$password', $cedula)";

			if (mysqli_query($conn, $sql3)) {
				header('Location:https://cargappcucuta.000webhostapp.com/perfiluser.php');
			}else{
				echo "Error insert user: " . $sql . "<br>" . mysqli_error($conn);
			}
		}else{
			echo "Error insert clien: " . $sql1 . "<br>" . mysqli_error($conn);
		}

		mysqli_close( $conn );
}






?>