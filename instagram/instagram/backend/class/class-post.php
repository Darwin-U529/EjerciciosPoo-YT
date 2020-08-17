<?php
    class Post {
        private $codigoPost;
        private $codigoUsuario;
        private $contenidoPost;
        private $imagen;
        private $cantidadLikes;

        public function __construct(
            $codigoPost,
            $codigoUsuario,
            $contenidoPost,
            $imagen,
            $cantidadLikes
        ){
            $this->codigoPost = $codigoPost;
            $this->codigoUsuario = $codigoUsuario;
            $this->contenidoPost = $contenidoPost;
            $this->imagen = $imagen;
            $this->cantidadLikes = $cantidadLikes;
        }

        public static function obtenerPosts($idUsuario){
            //USUARIOS
            //Obtenemos el valor del archivo en una sola variable con file_get_contents
            $contenidoArchivo = file_get_contents('../data/usuarios.json');

            //Lo ingresamos en otra variable en modo de arreglo asociativo con "json_decode"
            $usuarios = json_decode($contenidoArchivo, true);
            
            //Esta de esta manera ya que solo esta inicializado
            $usuario = null;

            //imagino sizeof == length
            for ($i=0; $i < sizeof($usuarios); $i++) { 

                //Si $usuario en la posicion del arreglo $i Y "codigoUsuario" en usuario.json == $idUsuario del parametro entonces
                if($usuarios[$i]["codigoUsuario"]==$idUsuario) {
                    $usuario = $usuarios[$i];
                    break;
                }
            }

            //COMENTARIOS
            $contenidoArchivoComentarios = file_get_contents('../data/comentarios.json');
            $comentarios = json_decode($contenidoArchivoComentarios, true);


            //POSTS
            //$usuario["siguiendo"]
            $contenidoArchivoPosts = file_get_contents('../data/posts.json');
            $posts = json_decode($contenidoArchivoPosts, true);

            //Este sera un arreglo vacillo que sera utilizado mas adelante
            $resultadoPost = array();
            for ($i=0; $i <sizeof($posts) ; $i++) { 

                //con el in_array, verificamos el valor de "codigoUsuario" en el post[$i], esta o es el mismo que el que esta en $usuario["siguiendo"]
                if (in_array($posts[$i]["codigoUsuario"], $usuario["siguiendo"])){
                    
                    //Si se cumple la condicion, ira entrando el post[$i], en el arreglo $resultadoPost[], y asi hasta terminar el ciclado
                    
                    //Se esta agregando un atributo "Comentarios al json, en cada posicion $i, y sera tipo arreglo ya que tendria varios comentarios
                    $posts[$i]["comentarios"] = array();

                    //for aninado para ingresar comentarios al json de posts
                    for ($k=0; $k < sizeof($comentarios); $k++) { 
                        if ($posts[$i]["codigoPost"] == $comentarios[$k]["codigoPost"]) {
                            
                            //Aqui va con conchetes vacios ya que lo asignamos como un arreglo, y le estamos diciendo que los comentarios que estamos jalando desde comentarios.json, los ingrese en ese atriibuto que es tipo arreglo
                            $posts[$i]["comentarios"][] = $comentarios[$k];
                        }
                    }

                    $resultadoPost[] = $posts[$i];
                }
            }

            //Lanzamos a pantalla los diferentes post!
            echo json_encode($resultadoPost);
        }

        /**
         * Get the value of codigoPost
         */ 
        public function getCodigoPost()
        {
                return $this->codigoPost;
        }

        /**
         * Set the value of codigoPost
         *
         * @return  self
         */ 
        public function setCodigoPost($codigoPost)
        {
                $this->codigoPost = $codigoPost;

                return $this;
        }

        /**
         * Get the value of codigoUsuario
         */ 
        public function getCodigoUsuario()
        {
                return $this->codigoUsuario;
        }

        /**
         * Set the value of codigoUsuario
         *
         * @return  self
         */ 
        public function setCodigoUsuario($codigoUsuario)
        {
                $this->codigoUsuario = $codigoUsuario;

                return $this;
        }

        /**
         * Get the value of contenidoPost
         */ 
        public function getContenidoPost()
        {
                return $this->contenidoPost;
        }

        /**
         * Set the value of contenidoPost
         *
         * @return  self
         */ 
        public function setContenidoPost($contenidoPost)
        {
                $this->contenidoPost = $contenidoPost;

                return $this;
        }

        /**
         * Get the value of imagen
         */ 
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */ 
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }

        /**
         * Get the value of cantidadLikes
         */ 
        public function getCantidadLikes()
        {
                return $this->cantidadLikes;
        }

        /**
         * Set the value of cantidadLikes
         *
         * @return  self
         */ 
        public function setCantidadLikes($cantidadLikes)
        {
                $this->cantidadLikes = $cantidadLikes;

                return $this;
        }
    }
?>