<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arrays</title>
</head>
<body>
  <?php
    $colores = array('rojo','naranja','amarillo','verde','azul','morado',);

    array_push($colores,'violeta');
    foreach($colores as $color){
      echo $color . "<br>";
    }
  ?>
</body>
</html>