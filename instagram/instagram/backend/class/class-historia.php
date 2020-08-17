<?php
    class Historia{
        private $codigoHistoria;
        private $codigoUsuario;
        private $usuario;
        private $imagenUsuario;
        private $historia;

        public function __construct(
            $codigoHistoria,
            $codigoUsuario,
            $usuario,
            $imagenUsuario,
            $historia
        ){
            $this->codigoHistoria = $codigoHistoria;
            $this->codigoUsuario = $codigoUsuario;
            $this->usuario = $usuario;
            $this->imagenUsuario = $imagenUsuario;
            $this->historia = $historia;
        }

        public static function obtenerUsuariosHistorias($codigoUsuario) {
            //Ingresamos el valor del data usuarios.json en una variable
            $contenidoArchivoUsuarios = file_get_contents('../data/usuarios.json');
            
            //convertimos en arreglo asociativo para poder recorrerlo
            $usuarios = json_decode($contenidoArchivoUsuarios, true);
            
            //Inicializamos esta variable que servira como filtro de el usuario que necesitamos enviado en la url con la peticion $_GET
            $usuario = null;

            for ($i=0; $i < sizeof($usuarios); $i++) { 
                
                //Verificamos si el $codigoUsuario proporcionado en la url es la misma que la de un usuario en usuarios.json
                if($usuarios[$i]["codigoUsuario"] == $codigoUsuario) {
                    
                    //lo almacena en la variable filtradora
                    $usuario = $usuarios[$i];
                }
            }

            $contenidoArchivoHistorias = file_get_contents('../data/historias.json');
            $historias = json_decode($contenidoArchivoHistorias, true);

            //Creamos este arreglo para filtrar las historias que si vera el Usuario, que, dado el caso, el codigoUsuario de historias.json se encuentre en siguiendo de usuarios.json, ingresarian aqui
            $usuariosHistorias = array();

            for ($i=0; $i < sizeof($historias); $i++) { 
                
                //in array, verifica si el valor "codigoUsuario" en el json posts[$i], se encuentra en el arreglo de "siguiendo" del json $usuario
                if (in_array($historias[$i]["codigoUsuario"], $usuario["siguiendo"])) {
                    //Retorna un Booleano V o F

                    //Van ingresando las historias de los diferentes usuarios que esta siguiendo el usuario principal en usuarios.json
                    $usuariosHistorias[] = $historias[$i];
                }
            }

            echo json_encode($usuariosHistorias);
        }

        /**
         * Get the value of codigoHistoria
         */ 
        public function getCodigoHistoria()
        {
                return $this->codigoHistoria;
        }

        /**
         * Set the value of codigoHistoria
         *
         * @return  self
         */ 
        public function setCodigoHistoria($codigoHistoria)
        {
                $this->codigoHistoria = $codigoHistoria;

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
         * Get the value of usuario
         */ 
        public function getUsuario()
        {
                return $this->usuario;
        }

        /**
         * Set the value of usuario
         *
         * @return  self
         */ 
        public function setUsuario($usuario)
        {
                $this->usuario = $usuario;

                return $this;
        }

        /**
         * Get the value of imagenUsuario
         */ 
        public function getImagenUsuario()
        {
                return $this->imagenUsuario;
        }

        /**
         * Set the value of imagenUsuario
         *
         * @return  self
         */ 
        public function setImagenUsuario($imagenUsuario)
        {
                $this->imagenUsuario = $imagenUsuario;

                return $this;
        }

        /**
         * Get the value of historia
         */ 
        public function getHistoria()
        {
                return $this->historia;
        }

        /**
         * Set the value of historia
         *
         * @return  self
         */ 
        public function setHistoria($historia)
        {
                $this->historia = $historia;

                return $this;
        }
    }
?>