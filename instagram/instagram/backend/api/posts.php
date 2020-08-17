<?php
//localhost:80/.../api/usuarios.php
        //cho "Metodo HTTP: ".$_SERVER['REQUEST_METHOD'];
        //Recibir peticiones del usuario
        //echo 'informacion: '. 
    header("Content-Type: application/json");

    //importamos el archivo " class-usuario.php " 
    include_once("../class/class-post.php");
    
    //Necesario solamente si usamos AXIOS, ya que hay que poblarlo manualmente y en modo arreglo asociativo
    $_POST = json_decode(file_get_contents('php://input'), true);

    //Utilizamos el switch para evaluar el metodo de la peticion con el REQUEST_METHOD
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':    //Guardar
            //Es necesario instanciar ya que el metodo utilizado no es static
            $post = new Post(       //Atributos internos del Constructor (Obligatoria inicializarlos de esta manera)
                $_POST['codigoPost'], 
                $_POST['codigoUsuario'], 
                $_POST['contenidoPost'], 
                $_POST['imagen'], 
                $_POST['cantidadLikes']
            );

            //Utilizamos la instancia, y de esta manera llamamos el metodo guardarPost() desde la clase class-post.php
            $post->guardarPost();
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