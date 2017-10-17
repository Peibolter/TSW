<?php 
session_start();
include("../Modelo/Modelo_Notas.php");
include("../Vistas/cabecera.php");
include("../Vistas/listarnotas.php");
include("../Vistas/modificarnota.php");
include("../Vistas/crearnota.php");




			if(isset($_REQUEST['CrearNota'])){

				$clasecrearnota=new crearnota();
				$clasecrearnota->cargar();
			}

			if(isset($_REQUEST['ListarNota'])){

				$claselistarnota=new listadoNotas();
				$claselistarnota->cargar();
			}
			if(isset($_REQUEST['Principal'])){

				$clasecabecera=new cabecera();
				$clasecabecera->cargar();
			}
			if(isset($_REQUEST['Modificar'])){


				
				 }
			if(isset($_REQUEST['Salir'])){
				$_SESSION['usuario']=null;
				session_destroy();
				//echo "<script>alert('dentro');</script>" ;
				header("Location: ../index.php");
			}



?>