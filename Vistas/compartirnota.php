<?php
class compartirnota{
	function cargar($datos,$texto,$idNota,$idi){
		include("../plantilla/cabecera.php");
			$cabecera=new cabecera();
			$cabecera->cargar($idi,"compartirNota");
?>

		<section class="listadosection">
					
					<p class="errorinsertado"><?php if($texto=="errorcompartir")echo"Error al compartir";?>
    		<form class="form-compartirnotas" action="../Controlador/Controladorredireccionador.php?action=compartirNota" method="post">
    			<fieldset>
    			<legend align="left"><?=$idi['compartirNota']; ?></legend>
			  		<input type="hidden" name="idNota" value="<?php echo $idNota; ?>" />		
			  		 			
			  		<?php 
			  			if($datos!=null){ 
			  		foreach($datos as $fila)
					{  ?>
					
					<div class="checkbox">
						
						<input type="checkbox" class="compartirCheck" name="alias[]" value="<?= $fila['alias'];?>" id="checkbox">  <?=$fila['alias'];?>  
						
					</div>
				
					<?php  }}?>						 
					<input  type="submit" value="<?=$idi['compartir']; ?>">
					

    			</fieldset>
    		</form>
    		
    					
    	</section>

    		</body>

		
	</html>

	<?php 
	}
}
	?>