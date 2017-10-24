
<?php 

 class registrar{ 
 	function cargar($texto,$idi){ 
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
	</div>	<div class="idiomas">
			 <a href="../Controlador/Controladorredireccionador.php?action=español"><input type="image" src="../img/iconoespanol.png" width="30" /></a>
			 <a href="../Controlador/Controladorredireccionador.php?action=ingles"><input type="image" src="../img/iconoingles.jpeg" width="30" /></a>
			 </div>
		<form class="login" method="post" action="Controladorredireccionador.php?action=registrarse">
		
		<div class="form-group"> 
			<label for="usuario"><?= $idi["usuario"] ?></label>
			<input type="text" class="form-control" id="usuario" name="usuario" placeholder="<?= $idi["introduceusuario"] ?>" maxlength="50" required  onblur="comprobarloginpassword(this);">
			<p id="usuarioparrafo"></p>
		</div>

		<div class="form-group"> 
			<label for="usuario"><?= $idi["nombrecompleto"] ?></label>
			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="<?= $idi["introduzcanombre"] ?>" maxlength="75" required  onblur="comprobarAlfabetico(this,75);">
			<p id="nombreparrafo"></p>
		</div>

		<div class="form-group">
			<label for="password"><?= $idi["contraseña"] ?></label>
			<input type="password" class="form-control" name="password" placeholder="<?= $idi["introducepass"] ?>" id="password" maxlength="25" required onblur="comprobarloginpassword(this);">
			<p id="passwordparrafo"></p>
		</div>
		<p class="error"> <?php if($texto=="UsuarioCreado") echo $idi["usuarioyacreado"];?> </p>
		<input type="submit" class="btn btn-primary" name="Registrarse"  value="<?= $idi["registrarse"]; ?>"></input>
		<a href="../index.php"><input type="button" class="btn btn-primary" name="Registrarse"  value="<?= $idi["volver"]; ?>"/> </a>
		</form>
		
 </div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>
<?php 
  }}
?>