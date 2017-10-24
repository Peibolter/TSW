<?php 
	include("Controlador.php");
	include("ControladorNota.php");
	include("../Idiomas/idiomas.php");
	include("../Idiomas/comprobaridioma.php");

	if(isset($_REQUEST['action'])){ 

			Switch ($_REQUEST['action']){
		  
			   	case 'logeado':		//accion que viene de si estas logeado e intentas ir a otro sitio desde el principal te lleva a la vista principal
			   		cargarListaNotas("");
					break;
		   		case 'acceder':	//accion que viene del indexcontrolador.php si no estas logeado y te lleva a login.php.
		   			cargarLogin("");
		   			break;
		   		case 'comprobarUsuario': // boton formulario login.php 
		   			cargoAcceso();
		   			break;
		   		case 'dentro':     	//cargo la vista principal porque me lo pide el controlador.php
		   		echo $_SESSION['usuario'];
					cargadoPrincipal(""); 
					break;
				case 'registro':	//boton login.php de registrar
						cargarRegistro();
					break;
				case 'registrarse':		//boton de registrarse de registrarse.php
						cargarRegistrarse();
						break;
				case 'registrado':		//cargo la vista login.php con exito.
					cargarLogin("UsuarioCreadoconExito");
					break;
				case 'ingles':		//seleccionamos ingles sin logearse
					$_SESSION['idioma']='ingles';
		   			cargarLogin("");
		   			break;
		   		case 'español':		//seleccionamos boton español sin logearse
		   			$_SESSION['idioma']='español';
		   			cargarLogin("");
		   			break;
		   		case 'españollogeado':	//seleccionamos boton español cuando estas dentro
		   			$_SESSION['idioma']='español';
		   			cargarListaNotas("");
		   			break;
		   		case 'ingleslogeado':	//seleccionamos boton inglés cuando estas dentro
		   			$_SESSION['idioma']='ingles';
		   			cargarListaNotas("");
		   			break;		
		   		case 'btnCrearNota':	//boton CrearNota cabecera
		   			cargarCrearNota();
		   			break;
		   		case 'btnAltaNota':		//boton Guardar de crearnota.php
		   			cargarAltaNota();
		   			break;
		   		case 'exitocrearnota':		//lanzamos la vista listarnota despues de crear nota
		   			cargarListaNotas("exito");
		   			break;
		   		case 'Eliminar':		//boton ppelera.
		   			echo "dentro";
		   			cargarListaNotas("exitoborrar");
		   			break;
		   		case 'Modificarnota':
		   		cargarListaNotas("exitomodificar");
		   			break;
		   		case 'comprobarnota':
		   		comprobarmodificar();
		   		break;
		   		case 'Salir':		//boton Salir
		   			session_destroy();
						header("Location: ../index.php");
		   			break;

		   	default:
		   		//header("location: Controlador.php?Login");
		   		break;
		   	}
	}

   	if(isset($_REQUEST['eliminar'])){
   			comprobareliminar($_REQUEST['eliminar']);
   		 }
   	if (isset($_REQUEST['modificar'])){
			cargarModificarNota($_REQUEST['modificar']);
		}




		   	function cargadoPrincipal($texto)
		   			{			
			   				//cargo idiomas
			                   $idioma=new idiomas();
			                   $idiom=comprobaridioma($idioma);

		                       $modeloNota=new Notas();
		                       $datos=$modeloNota->listarNotas($_SESSION['usuario']);
		                       $claselistadoNotas=new listadoNotas();
		                       $claselistadoNotas->cargar($datos,$texto,$idiom);
		   			}
			function cargarListaNotas($texto){
                    //cargo el idioma
                     $idioma=new idiomas();
                     $idiom=comprobaridioma($idioma);
                     //cargo el array de notas
                      $modeloNota=new Notas();
                      $datos=$modeloNota->listarNotas($_SESSION['usuario']);
                       //cargo la vista
                      $claselistadoNotas=new listadoNotas();
                      $claselistadoNotas->cargar($datos,$texto,$idiom);
               }
?>