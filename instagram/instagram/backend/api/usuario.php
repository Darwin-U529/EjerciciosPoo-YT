<?php
//localhost:80/.../api/usuarios.php
        //cho "Metodo HTTP: ".$_SERVER['REQUEST_METHOD'];
        //Recibir peticiones del usuario
        //echo 'informacion: '. 
    header("Content-Type: application/json");

    //importamos el archivo " class-usuario.php " 
    include_once("../class/class-usuario.php");
    
    //Utilizamos el switch para evaluar el metodo de la peticion con el REQUEST_METHOD
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':    
            //Guardar
        break;

        //Para los metodos obtenerUsuario() y obtenerUsuarios()
        case 'GET':

            //en la url se especifica en la id, de esa manera se toma para el metodo obtenerUsuario($indice), y retorna el json especifico (usuario)
            if (isset($_GET['id'])) {
                //EL metodo es static, por eso lo podemos llamar asi sin instanciar
                Usuario::obtenerUsuario($_GET['id']);

            }else{
                //traemos el metodo de la clase " class-usuario.php " de esta manera, ya que el metodo esta static, lo que nos permite llamar el metodo de esta manera sin necesidad de instancia
                Usuario::obtenerUsuarios(); 
            }      
        break;

        //Para el metodo actualizarUsuario()
        case 'PUT':
            // Actualizar                      
        break;

        //Para el metodo eliminarUsuario();
        case 'DELETE':
            // Eliminar
        break;
    }
        //Crear

        //Obtener un usuario

        //Obtener todos los usuarios

        //Actualizar un usuario

        //Eliminar un usuario

?>  