<?php
    //se establecen las credenciales para conectar con la base de datos
    $servername = "localhost";
    $username = "usuario";
    $password = "contraseña";
    $dbname = "mi_base_de_datos";

    //se establece la conexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    //se valida que si hay un error al realizar la conexion, se muestre el error
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    //se establece la query para obtener (get) toda la informacion del usuario con id 1
    $sql = "SELECT * FROM usuarios WHERE id = 1";
    //se guarda la respuesta en una variable
    $result = $conn->query($sql);

    //se valida que si en numero de filas es mayor que 0 (por lo que se estarian obteniendo los datos) ejecute un codigo
    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $row = $result->fetch_assoc();

        //se pasa la respuesta a un array asociativo donde se guarda el nombre, la edad y la ciudad
        $respuesta = array(
            "nombre" => $row["nombre"],
            "edad" => $row["edad"],
            "ciudad" => $row["ciudad"]
        );

        //se parsea la respuesta y se devuelve como un objeto json
        $jsonRespuesta = json_encode($respuesta);

        //se establece el header para que se entienda que es un objeto json
        header('Content-Type: application/json');
        //se imprime el objeto en pantalla
        echo $jsonRespuesta;
    } 
    //en caso de que no se hayan obtenido datos
    else {
        //se guarda el error en un array asociativo
      
        $respuesta = array("mensaje" => "No se encontraron resultados");
        // se convierte el array asociativo en un objeto json
        $jsonRespuesta = json_encode($respuesta);
        //se establece el header
        header('Content-Type: application/json');
        //se imprime el objeto en pantalla
        echo $jsonRespuesta;
    }

  //se cierra la conexion con la base de datos
    $conn->close();
?>