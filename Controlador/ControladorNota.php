<?php 
session_start();
include("../Modelo/Modelo_Notas.php");
include("../Vistas/cabecera.php");
include("../Vistas/listarnotas.php");
include("../Vistas/modificarnota.php");
include("../Vistas/crearnota.php");
include("../Vistas/compartirnota.php");


			if(isset($_REQUEST['CrearNota']))
			{
				$clasecrearnota=new crearnota();
				$clasecrearnota->cargar("");
			}
			if(isset($_REQUEST['AltaNota']))
			{
				$titulo=$_POST['titulo'];
				$descripcion=$_POST['descripcion'];
				$creadornota=$_SESSION['usuario'];
				$modeloNota=new Notas();
				$resultado=$modeloNota->crearNota($titulo,$descripcion,$creadornota);
				if($resultado==true)
					{ 
						$modeloNota=new Notas();
				$datos=$modeloNota->listarNotas($_SESSION['usuario']);
				
				$claselistarnotas=new listadoNotas();
				$claselistarnotas->cargar($datos,"exito");
					}else
					{
				$clasecrearnota=new crearnota();
				$clasecrearnota->cargar("error");
					}
			}
			if(isset($_REQUEST['ModificarNota']))
			{
				$titulo=$_POST['titulo'];
				$contenido=$_POST['contenido'];
				$creadornota=$_SESSION['usuario'];
				$id=$_POST['id'];
				
				$modeloNota=new Notas();
				$resultado=$modeloNota-> modificarNota($titulo,$contenido,$id);
				if($resultado==true)
					{ 
				$datos=$modeloNota->listarNotas($_SESSION['usuario']);
				$claselistarnotas=new listadoNotas();
				$claselistarnotas->cargar($datos,"exitomodificar");
					}else
					{
						$datos=$modeloNota->devolverlistaporid($id);
				$clasemodificarNota=new modificarNota();
				$clasemodificarNota->cargar($datos,"error");
					}
			}

			if(isset($_REQUEST['Eliminar'])){

				$modeloNota=new Notas();
				$id=$_REQUEST['Eliminar'];
				if($modeloNota->eliminarNotas($id)){ 
				//lanzamos la vista listar con las notas del usuario logeado mensaje nice
				$datos=$modeloNota->listarNotas($_SESSION['usuario']);
				$claselistarnota=new listadoNotas();
				$claselistarnota->cargar($datos,"exitoborrar");
			}else {
				//lanzamos la vista listar con las notas del usuario logeado mensaje error
				$datos=$modeloNota->listarNotas($_SESSION['usuario']);
				$claselistarnota=new listadoNotas();
				$claselistarnota->cargar($datos,"errorborrar");
			}
			}

			if(isset($_REQUEST['ListarNota'])){

				$modeloNota=new Notas();
				$datos=$modeloNota->listarNotas($_SESSION['usuario']);
				$claselistarnota=new listadoNotas();
				$claselistarnota->cargar($datos,"");
			}
			if(isset($_REQUEST['Principal'])){

				$clasecabecera=new cabecera();
				$clasecabecera->cargar();
			}
			if(isset($_REQUEST['Modificar'])){

				$id=$_REQUEST['Modificar'];
				$modeloNota=new Notas();
				$datos=$modeloNota->devolverlistaporid($id);
				
				$clasemodificarNota=new modificarNota();
				$clasemodificarNota->cargar($datos,"");
				
				 }

				 if(isset($_REQUEST['CompartirNota']))
					{	
						$id=$_REQUEST['CompartirNota'];
						$clasecompartirnota=new compartirnota();
						$clasecompartirnota->cargar("");

					}

			if(isset($_REQUEST['Salir'])){

				$_SESSION['usuario']=null;
				session_destroy();
				header("Location: ../index.php");
			}
			if(isset($_REQUEST['Eliminar'])){


			}



?>