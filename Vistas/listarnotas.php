<?php 

class listadoNotas{

		function cargar($datos,$texto,$idi,$notas){

			include("../plantilla/cabecera.php");
			$cabecera=new cabecera();
			$cabecera->cargar($idi,"listarNotas");
?>

		<section class="listadosection"> 
			<p class="exito"><?php if($texto=="exito")echo"Nota Creada";elseif($texto=="exitoborrar")echo"Nota Borrada";elseif($texto=="exitomodificar")echo"Nota Modificada";elseif($texto=="exitocompartir")echo"Nota compartida";?> </p>
			<p class="errorinsertado"><?php if($texto=="errorborrar")echo"Error al borrar";?> </p>

				<?php  if($datos!=null){ 
			foreach($datos as $fila)
			{  ?>
    		<form class="form-listarnotas">
    			<fieldset class="fieldset-listarnotas">
    			<legend align="left"><?=$idi["Nota"]?></legend>
			  		
			  		<div class="container well">

			    		<a class="a-lista" onClick="return confirm('¿Estas Seguro de que deseas eliminar esta nota?);"><?= $fila['nombre']; ?> </a><a href=../Controlador/Controladorredireccionador.php?eliminar=<?= $fila['id'];?> ?><i class="material-icons">delete</i></a> <a href=../Controlador/Controladorredireccionador.php?modificar=<?= $fila['id']; ?> > <i class="material-icons">create</i></a> <a href=../Controlador/Controladorredireccionador.php?compartirnota=<?= $fila['id']; ?> ><i class="material-icons">folder_shared</i></a>
			    		<input type="hidden" name="id" value="<?= $fila['id'];?>" />
			    		<p class="Descripcion"><?= $fila['contenido']; ?></p>
						</div>
						
    			</fieldset>
    			</form>
    		<?php }}  if($notas!=null){ 

    			foreach($notas as $fila)
				{  ?>
    		<form class="form-listarnotas">
    			<fieldset class="fieldset-listarnotas">
    			<legend align="left"><?=$idi["Nota"]?></legend>
			  		
			  		<div class="container well">
			  			
			    		<a class="a-lista"><?= $fila['nombre']; ?> </a>
			    		<input type="hidden" name="id" value="<?= $fila['id'];?>" />
			    		<p class="Descripcion"><?= $fila['contenido']; ?></p>
						</div>
						
    			</fieldset>
    			</form><?php } }?>

    			</section>
    		</body>
				
		
	</html>

<?php 
	 }
}
	?>