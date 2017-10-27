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
						
						<label><input type="checkbox" class="compartirCheck" name="alias[]" value="<?= $fila;?>" id="checkbox"><p class="alias"><?=$fila;?></p></label>

						
					</div>
				
					<?php  } ?>	
					<input  type="submit" value="<?=$idi['compartir']; ?>">
										 
					
					

    			</fieldset>
    		</form>
			<?php }else if ($datos==null){ ?>	
				<p><?=$idi['nousers'];?></p>					 
			<?php  } ?>	
    					
    	</section>
    

    		</body>

		
	</html>

	<?php 
	}
}
	?>