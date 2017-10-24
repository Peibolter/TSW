<?php //funcion para conectar a la base de datos
	class PDOConeection{ 
	private static $dbhost = "127.0.0.1";
	private static $dbname = "tsw";
	private static $dbuser = "root";
	private static $dbpass = "";
	private static $db_singleton = null;

	function conexionBD(){

		if (self::$db_singleton == null) {
				$mysqli=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
				if(!$mysqli){
					echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    				exit;
				}
			return $mysqli;
	}
	}
	 }

	?>