<?php
session_name('CargApp');
session_start();

$_SESSION['ID-SESSION'] = " ";
				
session_unset();
session_destroy();

	echo'<script type="text/javascript">
		    alert("se ha cerrado la sesión ");
		    window.location.href="login.html";
		</script>';
				

?>