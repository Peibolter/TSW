<?php
class crearnota{

		function cargar($texto,$idi){

			include("../plantilla/cabecera.php");
			$cabecera=new cabecera();
			$cabecera->cargar($idi,"creanota");
?>


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