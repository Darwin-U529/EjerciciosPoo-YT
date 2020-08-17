<?php
//localhost:80/.../api/usuarios.php
        //cho "Metodo HTTP: ".$_SERVER['REQUEST_METHOD'];
        //Recibir peticiones del usuario
        //echo 'informacion: '. 
    header("Content-Type: application/json");

    //importamos el archivo " class-usuario.php " 
    include_once("../class/class-post.php");
    
    //Utilizamos el switch para evaluar el metodo de la peticion con el REQUEST_METHOD
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':    
            //Guardar
        break;

        //Para los metodos obtenerUsuario() y obtenerUsuarios()
        case 'GET':

            //en la url se especifica en la id, de esa manera se toma para el metodo obtenerUsuario($indice), y retorna el json especifico (usuario)
            if (isset($_GET['idUsuario'])) { //Retorna los post de los los usuarios que esta siguiendo
                Post::obtenerPosts($_GET['idUsuario']);

            }if (isset($_GET['idPost'])) { //Retorna un post //momentaneamente no se usa

            }else{

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