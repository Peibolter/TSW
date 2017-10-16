
<?php 

	 class login{ 
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

		<form class="login" method="post" action="Controlador.php?Acceso='1'">
		
		<div class="form-group"> 
			<label for="usuario">Usuario:</label>
			<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Introduzca Usuario" maxlength="50" required  onblur="comprobarloginpassword(this);">
			<p id="usuarioparrafo"></p>
		</div>

		<div class="form-group">
			<label for="password">Contraseña:</label>
			<input type="password" class="form-control" name="password" placeholder="Introduzca una contraseña" id="password" maxlength="25" required onblur="comprobarloginpassword(this);">
			<p id="passwordparrafo"></p>
		</div>
		<div class="checkbox">
		<p class="exito"> <?php if($texto=="UsuarioCreadoconExito") echo "El usuario se ha creado con éxito";?> </p>
		
		<input type="submit" class="btn btn-primary" name="login"  value="Entrar"/>
		<a href="../Controlador/Controlador.php?Registro"><input type="button" class="btn btn-primary" name="Registrarse"  value="Registrarse"/> </a>
		</form>

		
 </div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>
<?php 
   }
  
   }
?>