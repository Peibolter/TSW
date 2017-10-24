<?php
class crearnota{

		function cargar($texto,$idi){
?>

<!DOCTYPE html>
<html lang="es">
		<head>
		<meta charset ="UTF-8">

			<title>CrearNota</title>
			<link rel="stylesheet" href="../css/estilos.css">
			<!--<link rel="stylesheet" href="../css/bootstrap.min.css">-->
			<link href="https://fonts.googleapis.com/css?family=Amatica+SC" rel="stylesheet">
			<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"><!--libreia para iconos de google-->
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
				<div class="dropdown">
				  <a href="#"><i class="material-icons">map</i><?= $idi["Idiomas"] ?></a>
				  <div class="dropdown-content">
				    <a href="../Controlador/Controladorredireccionador.php?action=españollogeado"><?= $idi["Español"] ?></a>
				    <a href="../Controlador/Controladorredireccionador.php?action=ingleslogeado"><?= $idi["Inglés"] ?></a>
				  </div>
				</div>
				<a href="../Controlador/Controladorredireccionador.php?action=btnCrearNota"><?= $idi["crearnota"] ?></a>
				<a href="../Controlador/Controladorredireccionador.php?action=logeado"><?= $idi["Notas"] ?></a>
				<a href="../Controlador/Controladorredireccionador.php?action=Salir"><?= $idi["Salir"] ?> </a>
				</nav>
			</div>
		</header>	
		<section class="main">
			
    		<form class="altaform" action="../Controlador/Controladorredireccionador.php?action=btnAltaNota" method="post">

    			<fieldset>

    			<legend align="left"><?= $idi["crearnota"] ?></legend>
			  			<div class="contenedorcrearnota">
			    			<p><a><?= $idi["Titulo"] ?> </a><input class="crear" name="titulo" type="text" placeholder="<?= $idi["Introduzcatitulo"] ?>" required></p>
			  		
						 <textarea name="descripcion" required maxlength="200" class="form-control" id="exampleTextarea" rows="6" cols="26" placeholder="<?= $idi["EscribeNota"] ?>" ></textarea>
						 <br>
						  <input  type="submit" value=<?= $idi["Guardar"] ?>>
						  </div>
						  <p class="errorinsertado"><?php if($texto=="error")echo $idi["errorCrear"];?> </p>
						  <!--<p class="exito"><?php //if($texto=="exito")echo"Nota Creada";?> </p>-->
    			</fieldset>
    		</section>
    		</body>

		
	</html>

	<?php  }} ?>