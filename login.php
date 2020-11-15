<?php
//se inicia la sesión
session_name('CargApp');
session_start();
$_SESSION['ID-SESSION'] = "";

$servername = "localhost";
$database = "id15018040_cargapp";
$username = "id15018040_root";
$password = "C@rg@pp123456";

$user = $_POST['usuario'];
$contraseña = $_POST['password'];

$conn = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}


		  
$consulta = "SELECT * FROM usuario WHERE usuario = '$user' AND contraseña = '$contraseña'";
$consulta1 = "SELECT * FROM usuariocond WHERE usuario = '$user' AND contraseña = '$contraseña'";
$consulta2 = "SELECT * FROM usuario WHERE usuario = '$user' || contraseña = '$contraseña'";
$consulta3 = "SELECT * FROM usuariocond WHERE usuario = '$user' || contraseña = '$contraseña'";

$resultado = mysqli_query($conn, $consulta);
$row_cnt = mysqli_num_rows($resultado);
$resultado1 = mysqli_query($conn, $consulta1);
$row_cnt1 = mysqli_num_rows($resultado1);
$resultado2 = mysqli_query($conn, $consulta2);
$row_cnt2 = mysqli_num_rows($resultado2);
$resultado3 = mysqli_query($conn, $consulta3);
$row_cnt3 = mysqli_num_rows($resultado3);

	
	if($row_cnt > 0 || $row_cnt1 > 0 || $row_cnt2 > 0 || $row_cnt3 > 0){
		if($row_cnt > 0 || $row_cnt1 > 0){
			if($row_cnt>0){
				$fila = $resultado->fetch_assoc(); 
				 /// Datos FUNDAMENTALES DEL GENERADOR DE CARGA 
				   $_SESSION['ID-SESSION'] = $fila['clienteid'];
				   $_SESSION['ESTADO']        = "IN";
				   $n = $_SESSION['ID-SESSION'];
				   
				$sql = "SELECT nombres, rol FROM cliente WHERE cedula = $n";
				$result = mysqli_query($conn, $sql);
				$row_rol = mysqli_num_rows($result);

				if($row_rol>0){
				  		$fila1 = $result->fetch_assoc(); 
				  		$_SESSION['nombres'] = $fila1['nombres'];
				   		$_SESSION['rol']     = $fila1['rol'];

				   		if($_SESSION['rol'] == 2){

					  		echo'<script type="text/javascript">
					    	alert("Bienvenido ' .$_SESSION["nombres"] .' ");
					    	window.location.href="perfiluser.php";
					   		</script>';
				   		}
				}	
			}elseif($row_cnt1>0){
				$fila = $resultado1->fetch_assoc(); 
				 /// Datos FUNDAMENTALES DEL TRANSPORTADOR 
				    $_SESSION['ID-SESSION'] = $fila['conductorid'];;
				    $_SESSION['ESTADO']        = "IN";
				    $n = $_SESSION['ID-SESSION'];
				   
				    $sql1 = "SELECT nombres, rol FROM conductor WHERE cedula = $n";
					$result1 = mysqli_query($conn, $sql1);
					$row_rol1 = mysqli_num_rows($result1);
				
					if($row_rol1>0){
					  		$fila = $result1->fetch_assoc(); 
					  		$_SESSION['nombres'] = $fila['nombres'];
					   		$_SESSION['rol']     = $fila['rol'];

					   		if($_SESSION['rol']== 1){

						  		echo'<script type="text/javascript">
						    	alert("Bienvenido ' .$_SESSION["nombres"] .' ");
						    	window.location.href="perfil.php";
						   		</script>';
					   		}
					  	}
			}
		}else{
				echo'<script type="text/javascript">
					alert("Usuario o contraseña erroneos ");
					window.location.href="login.html";
					</script>';
			}

	    /* liberar el conjunto de resultados */
	    mysqli_free_result($resultado);
	    mysqli_free_result($sql);
	}else{
		echo'<script type="text/javascript">
			alert("No tiene cuenta por favor cree una para  poder acceder a las ofertas ");
			window.location.href="register.html";
			</script>';
	}




?>