	

	<?php
	include("../Vistas/login.php");
	//include("../Vistas/cabecera.html");
	session_start();

		if (!isset($_SESSION['usuario'])){
			$clase=new login();
			$clase->cargar("");
			//header('Location: Vistas/login.php');
		}else{
			header('Location: Vistas/cabecera.html');
		}
	?>