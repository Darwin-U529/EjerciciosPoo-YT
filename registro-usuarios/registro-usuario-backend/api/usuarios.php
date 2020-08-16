<?php
//localhost:80/.../api/usuarios.php
        //cho "Metodo HTTP: ".$_SERVER['REQUEST_METHOD'];
        //Recibir peticiones del usuario
        //echo 'informacion: '. 
    header("Content-Type: application/json");

    //importamos el archivo " class-usuario.php " 
    include_once("../clases/class-usuario.php");
    switch($_SERVER['REQUEST_METHOD']){
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
        case 'GET':
            if (isset($_GET['id'])) {
                $resultado["mensaje"] = "Retornar el uduario con el id " . $_GET['id'];
                echo json_encode($resultado);
            }else{
                $resultado["mensaje"] = "Retornar todos los usuarios";  
                echo json_encode($resultado);
            }      
        break;
        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'), true);
            $resultado["mensaje"] = "Actualizar un usuario con el id: ".$_GET['id'].
                                    ",  Informacion actualizar: " . json_encode($_PUT);
            echo json_encode($resultado);                        
        break;
        case 'DELETE':
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