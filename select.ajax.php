<?php


$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

$conn = mysqli_connect($servername, $username, $password, $database);

$id = $_POST["id"];

echo console.log("estoy en el ajax".$id);

$sql = "SELECT id, nombre FROM municipio WHERE dptoid = $id";

$resultado = mysqli_query($conn, $sql);


foreach ($value = $resultado ->fetch_assoc()) {
	echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
}

?>