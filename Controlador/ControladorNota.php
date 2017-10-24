<?php 

include("../Modelo/Modelo_Notas.php");
include("../Vistas/cabecera.php");
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
				/*$datos=$modeloNota->listarNotas($_SESSION['usuario']);
				//cargo idiomas
                      $idioma=new idiomas();
                          $idiom=comprobaridioma($idioma);

				$claselistarnotas=new listadoNotas();
				$claselistarnotas->cargar($datos,"exitomodificar",$idiom);*/
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
					//lanzamos la vista listar con las notas del usuario logeado mensaje error
					$datos=$modeloNota->listarNotas($_SESSION['usuario']);
					$claselistarnota=new listadoNotas();
					$claselistarnota->cargar($datos,"errorborrar",$idiom);
				}
			}

			if(isset($_REQUEST['ListarNota'])){

				$modeloNota=new Notas();
				echo $_SESSION['usuario'];
				$datos=$modeloNota->listarNotas($_SESSION['usuario']);
				//cargo idiomas
                          $idioma=new idiomas();
                          $idiom=comprobaridioma($idioma);

				$claselistarnota=new listadoNotas();
				$claselistarnota->cargar($datos,"",$idiom);
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

				//Icono compartir de la nota
          	if(isset($_REQUEST['CompartirNota']))
          	{ 	
          		//cargo idiomas
                $idioma=new idiomas();
                $idiom=comprobaridioma($idioma);

	           	$modeloNota=new Notas();
	            $datos=$modeloNota->listarUsuarios($_SESSION['usuario']);
	            $idNota=$_REQUEST['CompartirNota'];	           
	            $clasecompartirnota=new compartirnota();
	            $clasecompartirnota->cargar($datos,"",$idNota,$idiom);
         	}
         	 //boton compartir nota con otros usuarios
         	 //boton compartir nota con otros usuarios
         	 if(isset($_REQUEST['altaCompartirNota']))
        	{          	  	
          	  	$alias=$_POST['alias'];
				$id=$_POST['idNota'];
				//cargo idiomas
                $idioma=new idiomas();
                $idiom=comprobaridioma($idioma);
				foreach( $alias as $key => $n ) {
				$modeloNota=new Notas(); 
				$resultado=$modeloNota->AltaCompartirNota($n,$id);
				  } 

				if($resultado==true)
					{ 
					$modeloNota=new Notas();
					$datos=$modeloNota->listarNotas($_SESSION['usuario']);				
					$claselistarnotas=new listadoNotas();
					$claselistarnotas->cargar($datos,"exitocompartir",$idiom);
					}else
					{
					$modeloNota=new Notas();
					$datos=$modeloNota->listarNotas($_SESSION['usuario']);				
					$claselistarnotas=new listadoNotas();
					$claselistarnotas->cargar($datos,"errorcompartir",$idiom);
					}				
            }

			



?>