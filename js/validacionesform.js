//Funcion que utilizo para comprobar vacios 
    function comprobarvacioPablo(campo){
       if ((campo.value == null) || (campo.value.length == 0)){//comprueba el campo input que se pasa por parametro si lo que tiene dentro es vacio y su longitud vale 0.
      
        return false;
      }
      else{
        return true;
      }
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////
 	function comprobarAlfabetico(campo,size){
          var texto="";     //variable texto que guarda lo que vamos a introducir en caso de que la comprobación sea false.
          var resultado=true;//variable boolean que guarda el resultado de la función.
          var borrar=false;//variable booleana que guarda el valor de true o false dependiendo de si borramos el campo input.
          var vacio=true;//variable booleana que sirve para guardar si un campo es vacio o no.
          vacio=comprobarvacioPablo(campo);//
        if(/^([a-zA-ZáéíóúñÑ\s])+$/.test(campo.value) == false || (vacio==false)){//comprueba que solo admite letras el campo input y que ademas no sea vacio
              texto="Introduce solo letras";
              borrar=true;
              resultado=false;
        }else if(campo.value.length<=size){//comprueba el tamaño introducido por parametro con el del campo input.
              resultado=true;
              }else{ 
                borrar=true;
              texto="Introduce letras con una longitud menor que :"+size;
              resultado=false;
        }
        if((borrar==true) && (campo.name=="nombre")){//comprueba el campo apellido y si borrar es true para ver si debemos borrar el campo apellido.
              document.getElementById("nombre").value ="";
        }
        if(campo.name=="nombre"){//comprueba el campo especificio de apellido para introducir el texto en apellido.
               var estilo=document.getElementById("nombreparrafo");//variable auxiliar de estilo en el que se aplica al campo input especificado
              estilo.style.color="red";    
              document.getElementById("nombreparrafo").innerHTML = texto;
        }
        return resultado;
        }


        function comprobarloginpassword(campo){
        var texto="";//variable texto que guarda lo que vamos a introducir en caso de que la comprobación sea false.
        var resultado=true;//variable boolean que guarda el resultado de la función.
        var vacio=true;//variable booleana que sirve para guardar si un campo es vacio o no.
          vacio=comprobarvacioPablo(campo);//

            if (!/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/.test(campo.value) || (vacio==false))//comprueba con la expresion regulr si es una contraseña aceptable.
             {
                texto="Introduzca letras,numeros y caracteres correctos";
                 resultado=false;
               if(campo.name=="usuario")
                {
                  document.getElementById("usuario").value ="";
                }else if (campo.name=="password") {
                	document.getElementById("password").value ="";
                }
             } 
             if(campo.name=="usuario")
                {
              var estilo=document.getElementById("usuarioparrafo");//variable auxiliar de estilo en el que se aplica al campo input especificado
              estilo.style.color="red";
              document.getElementById("usuarioparrafo").innerHTML = texto;   	
                }else if (campo.name=="password") {
                	var estilo=document.getElementById("passwordparrafo");//variable auxiliar de estilo en el que se aplica al campo input especificado
              estilo.style.color="red";
              document.getElementById("passwordparrafo").innerHTML = texto;   
                }

      return resultado;

        }