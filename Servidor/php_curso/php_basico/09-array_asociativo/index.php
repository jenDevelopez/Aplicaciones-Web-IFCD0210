<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Array Asociativo</title>
</head>

<body>
  <?php
  $contactos = array(
    array("nombre" => "Maria Benitez", "telefono" => "612345678", "email" => "mariabenitez@gmail.com"),
    array("nombre" => "Pablo Martín", "telefono" => "712345679", "email" => "pablomartin@gmail.com"),
    array("nombre" => "Marta Marín", "telefono" => "612345677", "email" => "martamarin@gmail.com"),
  );
  echo "<h2>Contactos</h2> <hr> <br>";
  ?>
  <ol>
    <?php
    foreach ($contactos as $contacto) {
      foreach($contacto as $key => $valor){
        echo "$key - $valor <br>";
      }
      echo "<hr>";
    }
    ?>
  </ol>
  <?php
  $nuevoContacto = array("nombre" => "Laura López", "telefono" => "632345677", "email" => "martamarin@gmail.com");
  array_push($contactos,$nuevoContacto);
  $contactos[0]['telefono'] = '712345678';
  echo "<h2>Nueva lista de contactos</h2>"

  ?>
  <ol>
    <?php
    foreach ($contactos as $contacto) {
      foreach($contacto as $key => $valor){
        echo "$key - $valor <br>";
      }
      echo "<hr>";
    }
    ?>
  </ol>

</body>

</html>
