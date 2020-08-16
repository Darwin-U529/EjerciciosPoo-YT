<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola mundo PHP</title>
    <style>
        table td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        $nombre = "Juan";
        $apellido = "Perez";
        $edad = 16;
        $persona = ["Maria", "Pedro", "Jesus"];

        echo "<ul>";
        for ($i=0; $i < sizeof($persona); $i++) { 
            echo "<li>$persona[$i]</li>";
        }
        echo "</ul>";

        //Arreglo Asociativo
        $estudiante = array (
            "nombre" => "Jose",
            "apellido" => "Rodriguez",
            "correo" => "jrodriguez@gmail.com",
        );
        
        //Convierte el arreglo asociativo a JSON
        echo json_encode($estudiante); //solo le enviamos el valor, que seria el arreglo
        //retorna  una Cadena

        //Si tenemos este tipo de arreglo asociativo, en formato cadena, utilizamos json_decode para retransformarlo de nuevo a asociativo
        $strEstudiante2 = '{"nombre":"Jose","apellido":"Rodriguez","correo":"jrodriguez@gmail.com"}';
        //Convierte de JSON a arreglo asociativo
        $estudiante2 = json_decode($strEstudiante2, true);
        //Con el 2do parametro true nos lo retorna en formato Arreglo asociativo, de no poner true, entonces el retorno seria con indices numericos

        // El echo <pre> nos lo ordena en el caso de tener tipo de servidor XAMP, con WAMP no es necesarios
        echo '<pre>';
        //Tipo de funcion me me muestra de manera "bonita" los arreglos asociativos, parecido a lo que ya tenemos con el ForEach, pero basicamente resumido en una funcion 
        var_dump($estudiante2);
        echo '</pre>';

        //Lo ejecutamos de esta manera, ya que es asociativo
        echo "<br>Nombre: " . $estudiante["nombre"];

        //Igual se le puede asignar la posicion en el arreglo manualmente, simplemente asignandoselo en los corchetes
        $edades[] = 34;     //0
        $edades[] = 55;     //1
        $edades[] = 60;     //2

        $ingeniero["nombre"] = "Mario";
        $ingeniero["apellido"] = "Dominguez";
        $ingeniero["edad"] = "66";

        //Sencillamente recorre el arreglo ingeniero, va tomando la 'key' que seria el tipo atributo, y va mostrando su valor
        echo "<table>";
        foreach ($ingeniero as $key => $value) {
            echo "<tr><td>$key</td><td>$value</td></tr>";
        }
        echo "</table>";


        //echo "Hola " . $nombre ;  //Concatenar es con .
        echo "<br>Hola  $nombre $apellido "; //Mejor manera de concatenar solo con espacio y comillas dobles
    
    ?>
</body>
</html>