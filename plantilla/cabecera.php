<?php 

class cabecera{

	function cargar($idi,$title){
?>
		
		<!DOCTYPE html>
<html lang="es">
		<head>
		<meta charset ="UTF-8">
		
			<title><?php if($title=="creanota")echo $idi["crearnota"]; elseif($title=="modificarnota")echo $idi["modificarNota"]; elseif($title=="listarNotas")echo $idi["listarNotas"];elseif($title=="compartirNota")echo $idi["compartirNota"];?></title>
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
				<a href="../Controlador/Controladorredireccionador.php?action=logeado" class="thumb pull-left">
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



<?php

		
	}
}


?>