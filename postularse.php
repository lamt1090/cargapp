<?php

session_name('CargApp');
session_start();
if($_SESSION['ID-SESSION'] == ""){
    echo'<script type="text/javascript">
                    alert("Debes iniciar sesion");
                        window.location.href="login.html";
                </script>';
}elseif($_SESSION['rol'] == 2){
    header('Location:/ofertas.php');
}

$n = $_SESSION['ID-SESSION'];

$id = $_GET['id'];

$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

$conn = mysqli_connect($servername, $username, $password, $database);

if($conn == true){

    $sql = "UPDATE oferta SET apartado = 'si' WHERE id = $id";
    $sql = "INSERT INTO viajesapartados (id_oferta, conductorid) VALUES ($id, $n)";

    

	if (mysqli_query($conn, $sql)) {

		echo'<script type="text/javascript">
    				alert("Se aparto con exito el viaje");
    					window.location.href="ofertasrecientes.php";
   			</script>';

				//header('Location:https://cargappcucuta.000webhostapp.com/perfil.html');

	}else{

				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}else{
    echo "todo salio mal";
}
//mysqli_close( $conn );




?>