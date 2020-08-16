<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php   
        include_once('clases/class-usuario.php'); //Incluye la clase una sola vez
        
        //$variable = valor

        //Utilizando directamente Constructor para los valores de los atributos de la funcion usuario
        $objeto = new Usuario("Pedro", "Martinez", "12/12/20120", "Masculino");
        //$objeto->setNombre("Juan");
        //$objeto->setApellido("Perez");
        

        //echo "<h1>".$objeto->getNombre() ." ". $objeto->getApellido()."</h1>";
        echo "<h1>$objeto</h1>"
    ?>

</body>
</html>

