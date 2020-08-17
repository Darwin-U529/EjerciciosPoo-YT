<?php
//localhost:80/.../api/usuarios.php
        //cho "Metodo HTTP: ".$_SERVER['REQUEST_METHOD'];
        //Recibir peticiones del usuario
        //echo 'informacion: '. 
    header("Content-Type: application/json");

    //importamos el archivo " class-usuario.php " 
    include_once("../class/class-historia.php");
    
    //Utilizamos el switch para evaluar el metodo de la peticion con el REQUEST_METHOD
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':    
            //Guardar
        break;

        //Para los metodos obtenerUsuario() y obtenerUsuarios()
        case 'GET':     //Consultar

            //en la url se especifica en la id, de esa manera se toma para el metodo obtenerUsuario($indice), y retorna el json especifico (usuario)
            if (isset($_GET['idUsuario'])) { //Retorna las historias de los usuarios a los cuales esta siguiendo
                
                Historia::obtenerUsuariosHistorias($_GET['idUsuario']);
                //ingresamos sin instancia ya que es estatico

            }if (isset($_GET['idHistoria'])) { //Retorna una historia, con el id directo de historias.json //momentaneamente no se usa

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