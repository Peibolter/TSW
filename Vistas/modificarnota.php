<?php
class modificarNota{
		function cargar($datos,$texto){


?>

<!DOCTYPE html>
<html lang="es">
		<head>
		<meta charset ="UTF-8">

			<title>Header</title>
			<link rel="stylesheet" href="../css/estilos.css">
		<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
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
				<a href="../Controlador/ControladorNota.php?Salir">Salir </a>
				</nav>
			</div>
		</header>
		<section class="main">
			
    		<form class="altaform" action="../Controlador/ControladorNota.php?ModificarNota" method="post">

    			<fieldset class="titulofieldset" >
    			<?php foreach($datos as $fila)
			{  ?>
    			<legend align="left">Modificar Nota</legend>
			  				<div class="contenedorcrearnota">
			    			<p><a>Titulo</a> <input  type="text"  name="titulo" readonly required value=<?= $fila['nombre'];?> ></p>
			    			<input type="hidden" name="id" value=<?= $fila['id']; ?> >
						 <textarea maxlength="200" name="contenido" required class="form-control" id="exampleTextarea" rows="6" cols="26" placeholder="Escribe tus notas"><?= $fila['contenido']; ?></textarea>
						 <br>
						  </div>
						  <input  type="submit" value="Modificar">
						    <p class="errorinsertado"><?php if($texto=="error")echo"Imposible Modificar nota";?> </p>
						  <?php  }?>
    			</fieldset>
    			</form>
    		</section>
    		</body>

		
	</html>

	<?php  }} ?>