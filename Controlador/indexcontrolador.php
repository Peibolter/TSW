	

	<?php
	  // octal; valor de modo correcto
	session_start();
		if (!isset($_SESSION['usuario'])){
			header("location: Controladorredireccionador.php?action=acceder");

		}else{
			header("location: Controladorredireccionador.php?action=logeado");
		}
	?>