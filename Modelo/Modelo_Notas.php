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

	function listarNotas($user){
		$mysqli=$this->conexionBD();
		$query="SELECT `id`, `nombre`, `contenido`, `creador_nota` FROM `nota` WHERE `creador_nota`='$user'";
		 // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $mysqli->query($query))){

		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
    	$filas=null;
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
	$filas=null;
	$form=array();
	$query="SELECT * FROM usuario WHERE `alias`!= '$usuarioSesion'";		
	$resultado=$mysqli->query($query);

	while($fila = $resultado->fetch_array())
	{
		$filas[] = $fila;
	}

	if($fila!=null){  
	foreach($filas as $fila)
	{
		$alias=$fila['alias'];		

		$fila_array=array("alias"=>$alias);
		array_push($form,$fila_array);
	}}
	$resultado->free();
	$mysqli->close();
	return $form;
}
//Lista los usuarios con la nota actual ya compartida
function listarUsuariosYACompartidos($idNota){
	$this->conexionBD();
	$mysqli=$this->conexionBD();

	$form=array();
	$query="SELECT `alias_compartir` as 'alias' FROM compartir WHERE `id_nota_compartir` = '$idNota'";
	$resultado=$mysqli->query($query);	
	if ($resultado->num_rows > 0){

		while($fila = $resultado->fetch_array())
				{
					$filas[] = $fila;
				}
		return $filas;
		
	}
    else{ 

    	return null;
	}
}
function listarNotasCompartidas($usuarioSesion){
	$filas=null;
	$this->conexionBD();
	$mysqli=$this->conexionBD();
	$query="SELECT * FROM  `compartir` WHERE `alias_compartir`= '$usuarioSesion'";
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
	function notascompartidasUsuario($notascompartidas){

		$file=fopen("../Archivos/notascompartidas.php", "w");
		fwrite($file,"<?php class arrayNotas { function cargar(){". PHP_EOL);
		fwrite($file,"\$notasarray=array(". PHP_EOL);

		if($notascompartidas!=null){

		foreach($notascompartidas as $notacompartida)
			{	
				$id=$notacompartida['id_nota_compartir'];
				$mysqli=$this->conexionBD();
					$query="SELECT * FROM `nota` WHERE `id`=
					'$id'";
					$result=$mysqli->query($query);

					if ($result->num_rows > 0){
						$boolean=TRUE;
						 while($fila = $result->fetch_assoc()){
				if($boolean==TRUE){

				$nombre=$fila['nombre'];
				$contenido=$fila['contenido'];
				fwrite($file,"array(\"nombre\"=>'$nombre',\"contenido\"=>'$contenido',". PHP_EOL);
				$boolean=FALSE;
				}
				 fwrite($file,"),". PHP_EOL);
				 }
				
			  }
			  //mysqli_free_result($resultado);
			  $result->close();
			  $mysqli->close();
			}
			
			}fwrite($file,");return \$notasarray;}}?>". PHP_EOL);
			fclose($file);
			}
				
}



?>