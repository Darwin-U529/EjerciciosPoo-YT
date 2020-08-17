<?php
//localhost:80/.../api/usuarios.php
        //cho "Metodo HTTP: ".$_SERVER['REQUEST_METHOD'];
        //Recibir peticiones del usuario
        //echo 'informacion: '. 
    header("Content-Type: application/json");

    //importamos el archivo " class-usuario.php " 
    include_once("../clases/class-usuario.php");

    //Simulando que el servidor se tardara unos 5 seg. en respondernos
    sleep(3);
    switch($_SERVER['REQUEST_METHOD']){

        //Para el metodo guardarUsuario
        case 'POST': //Guardar

            //Obteniendo la informacion que envia el cliente
            //se almacena en $_POST en cadena json
            $_POST = json_decode(file_get_contents('php://input'), true);
                    //Se toman todos los valores de los inputs con "file_get_contents"
                    //json_decode - convierte el arreglo asociativo tomado a cadena json

            //creamos variable de tipo Usuario, le mandamos las variable con $_POST que estan en el constructor
            $usuario = new Usuario($_POST["nombre"], $_POST["apellido"], $_POST["fechaNacimiento"], $_POST["pais"]);
            
            //llamamos al metodo guardarUsuario() de esta manera
            $usuario->guardarUsuario();
            $resultado["mensaje"] = "Guardar usuario, informacion: ". json_encode($_POST);
            echo json_encode($resultado);
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
            $_PUT = json_decode(file_get_contents('php://input'), true);

            //Creamos la instancia del tipo usuario, con los datos que el cliente ingresa
            $usuario = new Usuario($_PUT['nombre'],$_PUT['apellido'],$_PUT['fechaNacimiento'],$_PUT['pais']);
            
            //llamamos la funcion actualizarUsuario(), junto con su id, mediante la peticion $_GET, que envia el id mediante la url
            $usuario->actualizarUsuario($_GET['id']);

            $resultado["mensaje"] = "Actualizar un usuario con el id: ".$_GET['id'].
                                    ",  Informacion actualizar: " . json_encode($_PUT);
            echo json_encode($resultado);                        
        break;

        //Para el metodo eliminarUsuario();
        case 'DELETE':
            Usuario::eliminarUsuario($_GET['id']);
            $resultado["mensaje"] = "Eliminar un usuario con el id: ". $_GET['id'];
            echo json_encode($resultado);
        break;
    }
        //Crear

        //Obtener un usuario

        //Obtener todos los usuarios

        //Actualizar un usuario

        //Eliminar un usuario

?>  