<?php
class modificarNota{
		function cargar($datos,$texto,$idi){

			include("../plantilla/cabecera.php");
			$cabecera=new cabecera();
			$cabecera->cargar($idi,"modificarnota");
?>


		<section class="main">
			
    		<form class="altaform" action="../Controlador/Controladorredireccionador.php?action=comprobarnota" method="post">

    			<fieldset class="titulofieldset" >
    			<?php foreach($datos as $fila)
			{  ?>
    			<legend align="left"><?= $idi["modificarNota"] ?></legend>
			  				<div class="contenedorcrearnota">
			    			<p><a><?= $idi["Titulo"] ?></a> <input  type="text"  name="titulo"  required placeholder="<?= $idi["Introduzcatitulo"] ?>" value=<?= $fila['nombre'];?> ></p>
			    			<input type="hidden" name="id" value=<?= $fila['id']; ?> >
						 <textarea maxlength="200" name="contenido" required class="form-control" id="exampleTextarea" rows="6" cols="26" placeholder="<?= $idi["EscribeNota"] ?>"><?= $fila['contenido']; ?></textarea>
						 <br>
						  </div>
						  <input  type="submit" value=<?= $idi["modificar"] ?>>
						    <p class="errorinsertado"><?php if($texto=="error")echo $idi["errorModificar"];?> </p>
						  <?php  }?>
    			</fieldset>
    			</form>
    		</section>
    		</body>

		
	</html>

	<?php  }} ?>