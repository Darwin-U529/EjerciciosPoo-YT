<?php
    //Toma el valor que manda el usuario, con el formato JSON.stringify
    $_POST = json_decode(file_get_contents("php://input"), true);
    //lo convertimos en arreglo asociativo

    echo json_encode($_POST); 
?>  