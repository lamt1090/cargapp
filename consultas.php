<?php
                                                 $consulta2 = "SELECT * FROM municipio";
                                                 $resultado2 = mysqli_query($conn, $consulta2);
                                                  while ($valores2 = $resultado2->fetch_assoc()) {
                                                    echo '<option value="'.$valores2['id'].'">'.$valores2['nombre'].'</option>';
                                                  }
                                                ?>



                                                elseif($_SESSION['rol'] == 2){
    header('Location:/perfiluser.php');
}else{
     header('Location: /perfil.php');
}


SELECT o.tipocarga tipocarga, o.fechasalida fechasalida, o.fechaentrega fechaentrega, o.pesocarga pesocarga, o.tipovehiculo tipovehiculo, o.valorflete valorflete, dptosl.nombre Ndptosl, mpiosl.nombre Nmpiosl, dptoet.nombre Ndptoet, mpioet.nombre Nmpioet FROM oferta o INNER JOIN departamento dptosl ON (dptosl.id = o.dtosalidaid) INNER JOIN municipio mpiosl ON (mpiosl.id = o.mpiosalidaid) INNER JOIN departamento dptoet ON (dptoet.id = o.dtodestinoid) RIGHT JOIN municipio mpioet ON (mpioet.id = o.mpiodestinoid) WHERE o.clienteid = 1090333222