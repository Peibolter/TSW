	

	<?php
	include("../Vistas/login.php");
	//include("../Vistas/cabecera.html");
	session_start();
	session_destroy();
		if (!isset($_SESSION['usuario'])){
			$clase=new login();
			$clase->cargar("");
		}else{
			header('Location: ../Vistas/cabecera.html');
		}
	?>