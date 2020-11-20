<?php

session_name('CargApp');
session_start();
if($_SESSION['ID-SESSION'] == ""){
    echo'<script type="text/javascript">
                    alert("Debes iniciar sesion");
                        window.location.href="login.html";
                </script>';
}elseif($_SESSION['rol'] == 1){
    header('Location:/perfil.php');
}

$n = $_SESSION['ID-SESSION'];
$id = $_SESSION['idoferta'];

$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

$conn = mysqli_connect($servername, $username, $password, $database);


$selectdptorigen = $_POST['selectdptorigen'];

$selectmpiorigen = $_POST['selectmpiorigen'];

$selectdptodestino = $_POST['selectdptodestino'];

$selectmpiodestino = $_POST['selectmpiodestino'];

$ndptosl = $_POST['ndptosl'];

$nmpiosl = $_POST['nmpiosl'];

$ndptoet = $_POST['ndptoet'];

$nmpioet = $_POST['nmpioet'];

$tpcarga = $_POST['tpcarga'];

$pesocarga = $_POST['pesocarga'];
	
$tpvehiculos = $_POST['tpvehiculos'];

$vflete = $_POST['vflete'];

$fechacarga = $_POST['fechacarga'];

$fechaentrega = $_POST['fechaentrega'];

$direccionorigen = $_POST['direccionorigen'];

$direcciondestino = $_POST['direcciondestino'];



	$sql = "UPDATE oferta SET ndptosl = '$ndptosl', nmpiosl = '$nmpiosl', ndptoet = '$ndptoet', nmpioet = '$nmpioet', tipocarga = '$tpcarga', direccionsalida = '$direccionorigen', direcciondestino = '$direcciondestino', pesocarga = '$pesocarga', tipovehiculo = '$tpvehiculos', valorflete = '$vflete', fechasalida = '$fechacarga', fechaentrega = '$fechaentrega' WHERE id = $id";

		//var_dump($conn,$sql); 

		if (mysqli_query($conn, $sql)) {

				echo'<script type="text/javascript">
    				alert("Datos Actualizados exitosamnete");
    					window.location.href="ofertas.php";
   				</script>';

		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);	
		}

		mysqli_close( $conn ); 



?>