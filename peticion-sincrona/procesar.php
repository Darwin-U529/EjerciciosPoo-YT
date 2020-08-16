<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //Accedemos al valor de la etiqueta con ese name
    /*    echo "Nombre: " . $_GET["usuario"];
        echo "Password: " . $_GET["password"];*/

        echo "Nombre: " . $_POST["usuarioP"];
        echo "Password: " . $_POST["passwordP"];
        
        //fopem para crear el archivo, el cual sera llamado en este caso usuarios.json, el a+ significa que se ira acumulando, si utilizamos w, borra todo y empieza a escribir de nuevo
        //w=write , r=read, a+ = anexcar (acumulando)
        $archivo = fopen("usuarios.json", "a+");
        //Le decimos que el archivo creado, igualmente estara almacenado en la variable archivo, dandole el valor del archivo creado tambien
        //Archivo tambien funciona como un apuntador

        //Le decimos que queremos guardar el json_enconde, en $archivo (escribir)
        fwrite($archivo, json_encode($_POST));      //json_encode = cadena en formato JSON

        //Sirve para cerrar cualquier flujo
        fclose($archivo);
    ?>
</body>
</html>