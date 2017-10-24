<?php 


class Notas {

	private $titulo;
	private $descripcion;

	
	//constructor
	function constructor($titulo,$descripcion)
	{
		$this->titulo=$titulo;
		$this->descripcion=$descripcion;
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
	function crearNota($titulo,$descripcion,$creadornota){
		$mysqli=$this->conexionBD();
		$query="INSERT INTO `nota`( `nombre`, `contenido`, `creador_nota`) VALUES ('$titulo','$descripcion','$creadornota')";
		$resultado=$mysqli->query($query);
		$mysqli->close();
		return $resultado;
	}

	/*function modificarNota($titulo,$descripcion,$creadornota){
		$mysqli=$this->conexionBD();
		UPDATE `nota` SET `id`=[value-1],`nombre`=[value-2],`contenido`=[value-3],`creador_nota`=[value-4] WHERE 1
		$query="INSERT INTO `nota`( `nombre`, `contenido`, `creador_nota`) VALUES ('$titulo','$descripcion','$creadornota')";
		$resultado=$mysqli->query($query);
		$mysqli->close();
		return $resultado;
	}*/
	function listarNotas($user){
		$mysqli=$this->conexionBD();
		$query="SELECT `id`, `nombre`, `contenido`, `creador_nota` FROM `nota` WHERE `creador_nota`='$user'";
		 // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $mysqli->query($query))){

		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado

    		while($fila = $resultado->fetch_array())
				{
					$filas[] = $fila;
				}
		return $filas;
	}
	}


	function eliminarNotas($id)
		{
		
		$mysqli=$this->conexionBD();
		$query="DELETE FROM `nota` WHERE `id`='$id'";
				 // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
		    if (!($resultado = $mysqli->query($query))){
		    	return "error al eliminar";
			
			}else{
				return $resultado;
					}
		}


	function devolverlistaporid($id){
		//$filas[] =null;
		$mysqli=$this->conexionBD();
		$query="SELECT  `id`,`nombre`, `contenido`, `creador_nota` FROM `nota` WHERE `id`='$id'";
		 // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $mysqli->query($query))){

		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado


    		while($fila = $resultado->fetch_array())
				{
					$filas[] = $fila;
				}
		return $filas;
	}
	}
	function modificarNota($titulo,$contenido,$id){
			$mysqli=$this->conexionBD();
		$query="UPDATE `nota` SET `nombre`='$titulo',`contenido`='$contenido'  WHERE `id`='$id'";
	
		if (!($resultado = $mysqli->query($query))){

		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado

		return $resultado;
	}
	}

function AltaCompartirNota($alias,$id){
	$mysqli=$this->conexionBD();
	$query="INSERT INTO `compartir`( `alias_compartir`, `id_nota_compartir`) VALUES ('$alias','$id')";
	$resultado=$mysqli->query($query);
	$mysqli->close();
	return $resultado;
}

//Lista los nombres de los usuarios menos el de la sesion abierta
function listarUsuarios($usuarioSesion){

	$this->conexionBD();
	$mysqli=$this->conexionBD();

	$form=array();
	$query="SELECT * FROM usuario WHERE `alias`!= '$usuarioSesion'";		
	$resultado=$mysqli->query($query);
	while($fila = $resultado->fetch_array())
	{
		$filas[] = $fila;
	}
	foreach($filas as $fila)
	{
		$alias=$fila['alias'];		

		$fila_array=array("alias"=>$alias);
		array_push($form,$fila_array);
	}
	$resultado->free();
	$mysqli->close();
	return $form;
}
}





?>