<?php


$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

$conn = mysqli_connect($servername, $username, $password, $database);

$dpto = $_POST['selectdpto'];

$sql = "SELECT id, nombre FROM municipio WHERE dptoid = $dpto";

$resultado = mysqli_query($conn, $sql);

$cadena = "<select class="form-control" id="selectmunicipio" name="selectmpio" required data-error="Por favor seleccione un municipio">";

while ($ver=mysqli_fetch_row($resultado)){
	$cadena = $cadena . '<option value ='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
}

echo $cadena."</select>";

?>