<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Importacion de clases
        include_once('clases/class-alumno.php');
        include_once('clases/class-maestro.php');

        $alumno = new Alumno('Juan','Perez',35,'Masculino','Ing en Sistemas','20171003151',65);
        $maestro = new Maestro('Juan','Perez',35,'Masculino','Ing en Sistemas','33501', 7000, "Matutino");

        //echo $alumno->getNombre(); //Es posible utilizar getNombre que esta en la clase persona, debido a que estamos utilizando herencia en alumno
        //$alumno->cancelarClase();
        $maestro->matricular();
        $alumno->matricular();
        
        //$alumno->aprobar();
        //$alumno->reprobar();

        //No se puede instanciar por ser una clase abstracta
        //$persona = new Persona('Pedro', 'Martinez', 33, 'Masculino', 'Ing Quimica');
    ?>
</body>
</html>