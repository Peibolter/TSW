<?php
class compartirnota{
	function cargar($datos,$texto,$idNota){
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset ="UTF-8">
		<title>CompartirNota</title>
		<link rel="stylesheet" href="../css/estilos.css">
		<!--<link rel="stylesheet" href="../css/bootstrap.min.css">-->
		<link href="https://fonts.googleapis.com/css?family=Amatica+SC" rel="stylesheet">
		<script type="js/jquery.js"></script>
		<script type="js/bootstrap.min.js"></script>
	</head>
	<body>
		<header class="header2" >
			<div class="wrapper">
				<div class="logo">
					<a href="../Controlador/ControladorNota.php?Principal" class="thumb pull-left">
					<img  class="fotocabecera" src="../img/logoDayNote.PNG" alt="" >
					</a>
				</div>
				<nav class="cabecera">
					<a href="../Controlador/ControladorNota.php?CrearNota">Crear Nota</a>
					<a href="../Controlador/ControladorNota.php?ListarNota">Notas</a>
					<a href="#">Salir </a>
				</nav>
			</div>
		</header>	
		<section class="listadosection">
					
    		<form class="form-compartirnotas" action="../Controlador/ControladorNota.php?altaCompartirNota" method="post">
    			<fieldset>
    			<legend align="left">Compatir Nota</legend>
			  		<input type="hidden" name="idNota" value="<?php echo $idNota; ?>" />		  			
			  		<?php foreach($datos as $fila)
					{  ?>
					
					<div class="checkbox">
						
						<input type="checkbox" class="compartirCheck" name="alias[]" value="<?= $fila['alias'];?>" id="checkbox">  <?=$fila['alias'];?>  
						
					</div>
				
					<?php  }?>						 
					<input  type="submit" value="Compatir">
					

    			</fieldset>
    		</form>
    		
    					
    	</section>

    		</body>

		
	</html>

	<?php 
	}
}
	?>