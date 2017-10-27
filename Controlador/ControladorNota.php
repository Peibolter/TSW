<?php 

include("../Modelo/Modelo_Notas.php");
include("../Vistas/listarnotas.php");
include("../Vistas/modificarnota.php");
include("../Vistas/crearnota.php");
include("../Vistas/compartirnota.php");

			function cargarCrearNota()
			{	
				//cargo idiomas
                $idioma=new idiomas();
                $idiom=comprobaridioma($idioma);

				$clasecrearnota=new crearnota();
				$clasecrearnota->cargar("",$idiom);
			}
			function cargarAltaNota()
			{
				$titulo=$_POST['titulo'];
				$descripcion=$_POST['descripcion'];
				$creadornota=$_SESSION['usuario'];
				$modeloNota=new Notas();
				$resultado=$modeloNota->crearNota($titulo,$descripcion,$creadornota);
				if($resultado==true)
					{ 
				header("location: Controladorredireccionador.php?action=exitocrearnota");
					}else
					{
				//cargo idiomas
                $idioma=new idiomas();
                $idiom=comprobaridioma($idioma);

				$clasecrearnota=new crearnota();
				$clasecrearnota->cargar("error", $idiom);
					}
			}
			function comprobarmodificar()
			{
				$titulo=$_POST['titulo'];
				$contenido=$_POST['contenido'];
				$creadornota=$_SESSION['usuario'];
				$id=$_POST['id'];
				$modeloNota=new Notas();
				$resultado=$modeloNota-> modificarNota($titulo,$contenido,$id);

				if($resultado==true)
					{ 
					header("location: ../Controlador/Controladorredireccionador.php?action=Modificarnota");
					}else
					{	
						//cargo idiomas
		                $idioma=new idiomas();
		                $idiom=comprobaridioma($idioma);
								$datos=$modeloNota->devolverlistaporid($id);
						$clasemodificarNota=new modificarNota();
						$clasemodificarNota->cargar($datos,"error",$idiom);
					}
			}

			function comprobareliminar($id){

				$modeloNota=new Notas();

				if($modeloNota->eliminarNotas($id)){ 
				header("location: Controladorredireccionador.php?action=Eliminar");

				}else {

					//cargo idiomas
	                $idioma=new idiomas();
	                $idiom=comprobaridioma($idioma);
					$datos=$modeloNota->listarNotas($_SESSION['usuario']);
					$claselistarnota=new listadoNotas();
					$claselistarnota->cargar($datos,"errorborrar",$idiom);
				}
			}
			
			function cargarModificarNota($id){

				//cargo idiomas
                $idioma=new idiomas();
                $idiom=comprobaridioma($idioma);
				$modeloNota=new Notas();
				$datos=$modeloNota->devolverlistaporid($id);
				$clasemodificarNota=new modificarNota();
				$clasemodificarNota->cargar($datos,"",$idiom);
				
				 }

				
          	//lista los usuarios a los que se puede compartir la nota	
			function cargarcompartiNota($idNota)
			{ 	
					//cargo idiomas
				$idioma=new idiomas();
				$idiom=comprobaridioma($idioma);
				$modeloNota=new Notas();
				$usuariosSinSesion=$modeloNota->listarUsuarios($_SESSION['usuario']);
				$usuariosYaCompartidos=$modeloNota->listarUsuariosYACompartidos($idNota);          

				//lista los usuarios menos los que ya tienen esa nota compartida
				if(($usuariosYaCompartidos)!=null){
				 	foreach($usuariosSinSesion as $aV){
						    $aTmp1[] = $aV['alias'];
					}

					foreach($usuariosYaCompartidos as $aV){
					    $aTmp2[] = $aV['alias'];
					}
					//devuelve los elementos diferentes de los arrays	 
					$new_array = array_diff($aTmp1,$aTmp2);
					   //reinicia los indices del array	   			
					$reindex=array_values($new_array); 				

					$clasecompartirnota=new compartirnota();
					$clasecompartirnota->cargar($reindex,"",$idNota,$idiom);
				}else{//lista todos los usuarios del sistema menos el de la sesion
					$clasecompartirnota=new compartirnota();
					foreach($usuariosSinSesion as $aV){
						    $aTmp1[] = $aV['alias'];
					}
					$clasecompartirnota->cargar($aTmp1,"",$idNota,$idiom);
				}         	
			}
       
			

         	
         	//Hace el alta de la id de la nota y el alias del usuario en la tabla compartir	
			function comprobarcompartirNota() {  
				  	
				$alias=$_POST['alias'];
				$id=$_POST['idNota'];
				$idioma=new idiomas();
				$idiom=comprobaridioma($idioma);
				foreach( $alias as $key => $n ) {
				$modeloNota=new Notas(); 
				$resultado=$modeloNota->AltaCompartirNota($n,$id);
				} 
				if($resultado==true)
					{ 
						header("location: Controladorredireccionador.php?action=comprobarcompartir");
				}else{
					$modeloNota=new Notas();
					$datos=$modeloNota->listarUsuarios($_SESSION['usuario']);
					$claselistarnotas=new compartirnota();
					$claselistarnotas->cargar($datos,"errorcompartir",$id,$idiom);
				}			
			}

			



?>