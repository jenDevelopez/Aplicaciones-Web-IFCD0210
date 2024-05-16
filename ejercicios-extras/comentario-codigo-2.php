<?php
    //se declara el valor de la respuesta y se le asigna el valor en un array asociativo
    $respuesta = array(
        "nombre" => "Juan",
        "edad" => 25,
        "ciudad" => "Madrid"
    );

   //se convierte el array asociativo en un objeto json
    $jsonRespuesta = json_encode($respuesta);

   //se establece el header como application/json para que el navegador entienda que es un objeto json
    header('Content-Type: application/json');
    //Se imprime en pantalla el objeto
    echo $jsonRespuesta;
?>