<?php 


class Usuario_Model
	{
	private $nombre;
	private $usuario;
	private $password;

	//constructor
	function constructor($nombre,$usuario,$password)
	{
		$this->nombre=$nombre;
		$this->usuario=$usuario;
		$this->password=$password;
	}
	//funcion para conectar a la base de datos
	function conexionBD(){
				$mysqli=mysqli_connect("127.0.0.1","root","","tsw");
				if(!$mysqli){
					echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    				echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    				exit;
				}
				
			return $mysqli;
	}

	
	function comprobarUsuario($user)
	{
		$mysqli=$this->conexionBD();
		$query="SELECT * FROM `usuario` WHERE  alias='$user'";
		$resultado=$mysqli->query($query);
		if(mysqli_num_rows($resultado)){

		return true;
		}else{
			return false;
		}
	}

	function crearUsuario($user,$pass,$nombre)
	{
		$mysqli=$this->conexionBD();
		$query="INSERT INTO `usuario`(`alias`, `password`, `nombre`) VALUES ('$user','$pass','$nombre')";
		$resultado=$mysqli->query($query);
		$mysqli->close();
		return $resultado;
	}
 }
 ?>