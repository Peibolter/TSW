<?php 

class cabecera{

		function cargar(){


?>
<!DOCTYPE html>
<html lang="es">
		<head>
		<meta charset ="UTF-8">

			<title>Header</title>
			<link rel="stylesheet" href="../css/estilos.css">
			<!--<link rel="stylesheet" href="../css/bootstrap.min.css">-->
			<link href="https://fonts.googleapis.com/css?family=Amatica+SC" rel="stylesheet">
			<script type="js/jquery.js"></script>
		<script type="js/bootstrap.min.js"></script>
		</head>
		<body>

		<header class="header2">
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

		<article >
		<a href="../Controlador/ControladorNota.php?CrearNota" class="thumb pull-left">
			<img  class="foto" src="../img/escritorio.jpg" alt="" height="200" width="250">
		</a>
		<h2 class="cabeceraizquierda">
		<a href="../Controlador/ControladorNota.php?CrearNota">Crea tus propias anotaciones.</a>
		</h2> 
		<p >
			DayNote te permite crear todas tus notas o anotaciones de manera 
			online con otros usuarios que desees compartirlas,como por ejemplo tu lista
			 de la compra,las tareas de la casa, recordatorios del mes,etc.¿A que esperas para compartir tus notas?.
    		</p>
    		
    		</article>

    		<article class="centro">
		<a href="../Controlador/ControladorNota.php?ListarNota" >
			<img class="foto2" src="../img/coffe.jpg" alt="" height="200">
		</a>
		<h2>
		<a href="../Controlador/ControladorNota.php?ListarNota" >Actualiza tus Notas.</a>
		</h2> 
		<p >
			DayNote te permite actualizar todas tus notas de manera instantaneo de manera que cada cambio que hagas en una nota ya creada puede modificar las que hayas hecho sin borrarlas.¡Asi siempre puedes estar atento a cualquier cambio en las notas!
    		</p>
    		</article>
    		<article class="derecha">
		<a href="../Controlador/ControladorNota.php?Compartir" >
			<img class="foto3" src="../img/images.jpg" alt="" height="200" >
		</a>
		<h2>
		<a href="../Controlador/ControladorNota.php?Compartir" class="derechah2">Comparte tus notas con tus amigos.</a>
		</h2> 
		<p class="parrafoderecha">
			Si deseas compartir tus notas de la comprar o cualquier lista que desees puedes hacerlo pulsando en compatir Nota, asi seleccionas la nota que deseas compartir con el usuario que desees y listo, asi de facil.¿A que estas esperando? ¡Animate!.
    		</p>
    		
    		</article>
    		
    		</section>
    		</body>

				
		
	</html>

	<?php
	  }}  ?>