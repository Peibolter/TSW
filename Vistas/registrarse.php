
<?php 

 class registrar{ 
 	function cargar($texto){ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/style.css">
<!--   funcionesjavascript-->
	<script type="text/javascript" src="../js/validacionesform.js"></script> 
</head>

<body>
		
<div class="container well" id="sha"> 

	<div class="row">
 		<div class="col-xs-12"> 
			<img src="..\img\avatar.png" class="img-responsive" id="avatar">
 		</div>
	</div>

		<form class="login" method="post" action="../Controlador/Controlador.php?Registrarse">
		
		<div class="form-group"> 
			<label for="usuario">Usuario:</label>
			<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Introduzca Usuario" maxlength="50" required  onblur="comprobarloginpassword(this);">
			<p id="usuarioparrafo"></p>
		</div>

		<div class="form-group"> 
			<label for="usuario">Nombre Completo:</label>
			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca Nombre" maxlength="75" required  onblur="comprobarAlfabetico(this,75);">
			<p id="nombreparrafo"></p>
		</div>

		<div class="form-group">
			<label for="password">Contraseña:</label>
			<input type="password" class="form-control" name="password" placeholder="Introduzca una contraseña" id="password" maxlength="25" required onblur="comprobarloginpassword(this);">
			<p id="passwordparrafo"></p>
		</div>
		<p class="error"> <?php if($texto=="UsuarioCreado") echo "El usuario ya esta creado";?> </p>
		<input type="submit" class="btn btn-primary" name="Registrarse"  value="Registrarse"></input>
		<a href="../index.php"><input type="button" class="btn btn-primary" name="Registrarse"  value="Volver"/> </a>
		</form>
		
 </div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>
<?php 
  }}
?>