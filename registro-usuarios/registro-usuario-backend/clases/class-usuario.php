<?php      

    class Usuario{
        private $nombre;
        private $apellido;
        private $fechaNacimiento;
        private $pais;
        
         //Siempre se llama asi en PHP, junto con los 2 guiones bajos
        public function __construct($nombre,$apellido,$fechaNacimiento,$pais) {        
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->fechaNacimiento = $fechaNacimiento;
            $this->pais = $pais;
        }
        
        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of apellido
         */ 
        public function getApellido()
        {
                return $this->apellido;
        }

        /**
         * Set the value of apellido
         *
         * @return  self
         */ 
        public function setApellido($apellido)
        {
                $this->apellido = $apellido;

                return $this;
        }

        /**
         * Get the value of fechaNacimiento
         */ 
        public function getFechaNacimiento()
        {
                return $this->fechaNacimiento;
        }

        /**
         * Set the value of fechaNacimiento
         *
         * @return  self
         */ 
        public function setFechaNacimiento($fechaNacimiento)
        {
                $this->fechaNacimiento = $fechaNacimiento;

                return $this;
        }

        /**
         * Get the value of pais
         */ 
        public function getPais()
        {
                return $this->pais;
        }

        /**
         * Set the value of pais
         *
         * @return  self
         */ 
        public function setPais($pais)
        {
                $this->pais = $pais;

                return $this;
        }

        public function __toString() {
            return $this->nombre." ".$this->apellido. 
            " ( ".$this->fechaNacimiento.", ".$this->pais." )";
        }

        public function guardarUsuario(){
                //Toma todo el archivo usuarios.json convertido a cadena, siempre con formato JSON
                $contenidoArchivo = file_get_contents("../data/usuarios.json");

                //Convertido a arreglo asociativo con json_decode (le damos la variable con el archivo json en cadena, true para que se vuelva asociativo)
                $usuarios = json_decode($contenidoArchivo, true);

                //Con esto anexamos un nuevo elemento al arreglo, en el archivo usuarios.json, existen 3 elementos, con este seria el 4to
                $usuarios[] = array(
                //esta en modo arreglo asociativo

                //Con los corchetes vacios le indica que este seria el ultimo + 1
                        "nombre"=> $this->nombre,
                        "apellido"=> $this->apellido,
                        "fechaNacimiento"=> $this->fechaNacimiento,
                        "pais"=> $this->pais,
                );
                //Con la funcion "fopen, nos permite abrir el archivo, y sustituirlo todo por lo que estamos ingresando anteriormente
                $archivo = fopen("../data/usuarios.json", "w");
                        //con el 1er parametro le decimos el archivo que queremos ingresar
                        //el 2do parametro "w" le dice que borrara todo lo existente sustituyendolo por el que le asignamos manualmente
                        
                        //json_enconde($usuarios) para convertir el json tipo asociativo a cadena tipo JSON
                fwrite($archivo, json_encode($usuarios));
                        //El 1er parametro es la referencia del archivo en donde ingresaremos el nuedo dato (json)
                        //El 2do es la cadena (formato json) que vamos a insertar

                //cierra el flujo datos de escritura en el json
                fclose($archivo);
        }

        //con el static, se puede acceder sin ninguna necesidad de instancias
        public static function obtenerUsuarios(){
                //Toma todo el archivo usuarios.json convertido a cadena, siempre con formato JSON
                $contenidoArchivo = file_get_contents("../data/usuarios.json");

                echo $contenidoArchivo;
        }

        public static function obtenerUsuario($indice){
                //Toma todo el archivo usuarios.json convertido a cadena, siempre con formato JSON
                $contenidoArchivo = file_get_contents("../data/usuarios.json");
                
                //para convertir $contenidoArchivo en un arreglo asociativo
                $usuarios = json_decode($contenidoArchivo, true);
                
                //$usuarios[$indice] toma el indice del json
                echo json_encode($usuarios[$indice]);
                //json_enconde para retornar a formato json(cadena)

                
        }

        public function actualizarUsuario($indice){
                //Toma todo el archivo usuarios.json convertido a cadena, siempre con formato JSON
                $contenidoArchivo = file_get_contents("../data/usuarios.json");
                
                //para convertir $contenidoArchivo en un arreglo asociativo
                $usuarios = json_decode($contenidoArchivo, true);

                //Crea un nuevo arreglo, ya que sera "tipo nuevo" ya que actualizara la posicion solicitada
                $usuario = array(
                        'nombre'=> $this->nombre,
                        'apellido'=> $this->apellido,
                        'fechaNacimiento'=> $this->fechaNacimiento,
                        'pais'=> $this->pais

                );

                //Le decimos que el indice en el que se encuentra, tendra la informacion de $usuario Actualizado
                $usuarios[$indice] = $usuario;
                
                //Cambiando la informacion derectamente en el archivo del servidor, y no solo en cache del navegador
                $archivo = fopen('../data/usuarios.json', "w");
                //aperturamos el archivo en la variable $archivo, y "w" para que sustituya lo que ya existe

                //le decimos que ingrese $usuarios ya actualizado y en formato json (json_enconde) en la variable $archivo
                fwrite($archivo, json_encode($usuarios));

                //cerramos el flujo
                fclose($archivo);
        }

        public static function eliminarUsuario($indice){
                //Toma todo el archivo usuarios.json convertido a cadena, siempre con formato JSON
                $contenidoArchivo = file_get_contents("../data/usuarios.json");
                
                //para convertir $contenidoArchivo en un arreglo asociativo
                $usuarios = json_decode($contenidoArchivo, true);

                //toma como primer parametro el arreglo (asociativo en este caso)
                //2do parametro el indice del arreglo
                //3er parametro la cantidad de veces que lo eliminara
                array_splice($usuarios, $indice, 1);


                //Cambiando la informacion derectamente en el archivo del servidor, y no solo en cache del navegador
                $archivo = fopen('../data/usuarios.json', "w");
                //aperturamos el archivo en la variable $archivo, y "w" para que sustituya lo que ya existe

                //le decimos que ingrese $usuarios ya actualizado y en formato json (json_enconde) en la variable $archivo
                fwrite($archivo, json_encode($usuarios));

                //cerramos el flujo
                fclose($archivo);
        }
    }
?> 