<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Variables Globales</title>
</head>
<body>
  <?php
  $nombre = "Bugs";
  $apellido = "Bunny";
  $edad = 81;
  $ciudadNatal = "New York";

  function mostrarDatos(){
    global $nombre, $apellido, $edad, $ciudadNatal;
    echo "<b>Nombre: </b> $nombre $apellido <br> \n";
    echo "<b>Edad: </b> $edad <br>";
    echo "<b>Ciudad Natal: </b> $ciudadNatal <br> \n";
  }

  mostrarDatos()
  ?>
</body>
</html>