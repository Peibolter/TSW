	

	<?php
	
	session_start();
		if (!isset($_SESSION['usuario'])){
			header("location: Controladorredireccionador.php?action=acceder");

		}else{
			header("location: Controladorredireccionador.php?action=logeado");
		}
	?>