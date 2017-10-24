<?php 
session_start();
include("../Modelo/Modelo_Usuario.php");
include("../Vistas/login.php");
include("../Vistas/registrarse.php");


          function cargoAcceso()
          {
                //cargo idiomas
                $idioma=new idiomas();
                $idiom=comprobaridioma($idioma);

                $user=$_POST['usuario'];
                $pass=$_POST['password'];
                $model=new Usuario_Model();
                $resultado=$model->comprobarLoginAcceso($user,$pass);

                  if($resultado==true){
                        $_SESSION['usuario']=$user;
                        header("location: Controladorredireccionador.php?action=dentro");
                      
                  }else{
                         $clase=new login();//creo la clase login
                         $clase->cargar("Usuarioincorrecto",$idiom);//lanzo la funcion de la clase cargar();
                  }  
         }

          function cargarRegistro()
          {
                 //cargo idiomas
                  $idioma=new idiomas();
                  $idiom=comprobaridioma($idioma);

                  $clase=new registrar();//creo la clase login
                  $clase->cargar("",$idiom);//lanzo la funcion de la clase cargar();
          }

          function cargarRegistrarse()  // viene del boton index registrarse
              {
                 $user=$_POST['usuario'];
                 $pass=$_POST['password'];
                 $nombre=$_POST['nombre'];
                 $model=new Usuario_Model();

                 $usuariocreado=$model->comprobarUsuario($user);
                if($usuariocreado==false)
                  {
                       $resultado=$model->crearUsuario($user,$pass,$nombre);

                    if($resultado==true) 

                      {
                      header("location: Controladorredireccionador.php?action=registrado");
                       //cargo idiomas
                       /*$idioma=new idiomas();
                       $idiom=comprobaridioma($idioma);
                       $clase=new login();//creo la clase login
                       $clase->cargar("UsuarioCreadoconExito",$idiom);//lanzo la funcion de la clase cargar();*/
                       }

                      }else{
                         //cargo idiomas
                          $idioma=new idiomas();
                          $idiom=comprobaridioma($idioma);
                         $clase=new registrar();//creo la clase login
                         $clase->cargar("UsuarioCreado",$idiom);//lanzo la funcion de la clase cargar();
                  }  

              }
             
            function cargarLogin($texto){
                  $idioma=new idiomas();
                  $idiom=comprobaridioma($idioma);
                  $clase=new login();
                  $clase->cargar($texto,$idiom);
            }

?>