<?php

include 'conexion.php';

	echo "estoy aqui";
echo "</br>";

if (isset($_POST['licencia']) && isset($_POST['soat']) && isset($_POST['tecmeca'])) {
	$licencia = 1;
	var_dump($_POST['licencia']);
	$soat = 1;
	var_dump($_POST['soat']);
	$tecmeca = 1;
	var_dump($_POST['tecmeca']);
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






?>