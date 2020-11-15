<?php

$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

echo'<script type="text/javascript">
					    	alert("Bienvenido a getMunicipio ");
					   		</script>';

$conn = mysqli_connect($servername, $username, $password, $database);

$id_dpto = $_POST['id_dpto'];

$sqlm = "SELECT id, nombre FROM municipio WHERE dptoid = $id_dpto";
$resultado = mysqli->query($sqlm);

$html = "<option value='0'>seleccione su municipio</option>";

while ($rowm = $resultado->fetch_assoc()) {
	$html = "<option value='".$rowm['id']."'>".$rowm['nombre']."</option>";
}

echo $html;

?>