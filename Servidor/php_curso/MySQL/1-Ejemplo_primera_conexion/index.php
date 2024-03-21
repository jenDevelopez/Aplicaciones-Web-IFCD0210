
  <?php 
    #ini
    $host = "localhost";
    $user = "developez";
    $password = "developez";

    #realizo la conexion
    $conexion = mysqli_connect($host,$user,$password) or die ("No se ha podido realizar la conexion");

    #Mensaje de verificacion
    echo "La conexion con la base de datos se ha realizado con exito <br>";

    #conexion con la base de datos
    $database = "noticias";
    mysqli_select_db($conexion, $database) or die("No se puede seleccionar la base de datos");

    #mensaje de confirmacion
    echo "Hemos seleccionado la base de datos";

    #intento de solicitar datos y mostrar en pantalla
    $q = "SELECT * FROM noticias";

    #hago la consulta
    $result = mysqli_query($conexion, $q) or die ('Fallo en la conexion');

    #obtengo el numero de filas de la result
    $nfilas = mysqli_num_rows($result);
  
    #cierro la conexion 
    // mysqli_close($conexion);
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accediendo a datos de mysql</title>
</head>
<body>
  <?php 

    echo "<h2>Numero de filas $nfiltas</h2>";
    #obtengo los valores de los campos

    while ($row = mysqli_fetch_array($result)) {
    
      // Mostrar la información
      echo "<h2>" . $row["titulo"] . "</h2>";
      echo "<p>" . $row["contenido"] . "</p>";
      echo "<img src=\"{$row["imagen"]}\" width=\"300\">";
    
      echo "<hr>";
    }
    


  
  ?>
</body>
</html>