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

                $sql3 = $conn->prepare("SELECT apartado FROM oferta WHERE id = $id");
                $sql3->execute();
                $clientes = $sql3->get_result();
                //$clientes = $resultSet->fetch_All();

                if($clientes && $clientes->num_rows>0){
                    $clientes->fetch_all(MYSQLI_ASSOC);
                }

                foreach($clientes as $cliente)
                             

            if ($cliente['apartado'] == "si") {
                             
                            echo'<script type="text/javascript">
                                alert("Lo siento este viaje ya esta apartado");
                                window.location.href="ofertasrecientes.php";
                        </script>';

            }else{

                    $sql = "UPDATE oferta SET apartado = 'si' WHERE id = $id";
                    $sql2 = "INSERT INTO viajesapartados (id_oferta, conductorid, valido) VALUES ($id, $n, 'null')";
                

                if (mysqli_query($conn, $sql)) {
                    if(mysqli_query($conn, $sql2)){


                        echo'<script type="text/javascript">
                                alert("Por ser de los primeros transportadores en utilizar nuestra aplicación podrás postularse a los viajes sin ningún costo durante 1 mes. Cuando pase el mes al postularse debes cancelar un costo de $50.000 pesos por viaje.");
                                window.location.href="ofertasrecientes.php";
                        </script>';

                        //header('Location:https://cargappcucuta.000webhostapp.com/perfil.html');
                    }else{

                            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                    }
                }else{

                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                            
            }
}else{
    echo "todo salio mal, por favor comuniquese con soporte";
}
//mysqli_close( $conn );


?>