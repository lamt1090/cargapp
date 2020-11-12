<?php

include 'conexion.php';

$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

$conn = mysqli_connect($servername, $username, $password, $database);


$name = $_POST['name'];
$apellidos = $_POST['apellidos'];
$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];
$nit = $_POST['nit'];
$razonsocial = $_POST['razonsocial'];
$email = $_POST['email'];
$selectdpto = $_POST['selectdpto'];
$selectmpio = $_POST['selectmpio'];
$direccion = $_POST['direccion'];


if ($conn == true) {
	
	$sql = "UPDATE cliente SET nit = '$nit', razonsocial = '$razonsocial', nombres = '$name', apellidos = '$apellidos', direccion = '$direccion', departamento = $selectdpto, municipio = $selectmpio, telefono = '$telefono',   correo = '$email', rol = 1 WHERE cedula = $cedula";

	//var_dump($conn, $sql);

	if (mysqli_query($conn, $sql)) {

			echo'<script type="text/javascript">
    				alert("Datos Guardados exitosamnete");
    					window.location.href="perfiluser.html";
   				</script>';

			
				//header('Location:https://cargappcucuta.000webhostapp.com/perfiluser.html');

	}else{

				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}else{
	echo "no hay conexión";
}






?>