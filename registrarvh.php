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

include 'conexion.php';

$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

$conn = mysqli_connect($servername, $username, $password, $database);

$placa = $_POST['placa'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];
$cpdadmax = $_POST['cpdadmax'];
$tpvehiculo = $_POST['tpvehiculo'];

if ($conn == true) {
	
	$sql = "INSERT INTO vehiculo (nroplaca, conductorid, marca, modelo, color, capacidadmax, tipovehiculo) VALUES ('$placa', $n, '$marca', '$modelo', '$color', '$cpdadmax', '$tpvehiculo'  )";

	if (mysqli_query($conn, $sql)) {
		
				echo'<script type="text/javascript">
    					window.location.href="perfil.php";
   				</script>';

	}else{

				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}else{
	echo "no hay conexión";
}



?>