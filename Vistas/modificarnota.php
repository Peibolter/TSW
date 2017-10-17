<?php
class modificarNota{

		function cargar(){


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
			
    		<form class="altaform">

    			<fieldset class="titulofieldset" >

    			<legend align="left">Modificar Nota</legend>
			  				<div class="contenedorcrearnota">
			    			<p><a>Titulo</a> <input  type="text" value="Lista de La Compra" readonly ></p>

						 <textarea maxlength="200" class="form-control" id="exampleTextarea" rows="6" cols="26" placeholder="Escribe tus notas">Patatas,cebollas,melocotones,cacahuetes,albaricoques,mortadela,chorizo,longanizas,almendritas,nocilla,churrasco,nueces,cocacola.</textarea>
						 <br>
						  </div>
						  <input  type="submit" value="Modificar">
    			</fieldset>
    		</section>
    		</body>

		
	</html>

	<?php  }} ?>