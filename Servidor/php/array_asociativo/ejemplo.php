<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Array Asociativo</title>
</head>
<body>
  <?php
  // declaro el array asociativo
    $fruta = array(
      "color" => "rojo",
      "sabor" => "dulce",
      "nombre" => "pera"
    );
    //imprimo en pantalla el objeto
    echo "<h2>Array asociativo fruta</h2>";
    foreach($fruta as $key => $valor){
      echo "$key - $valor <br>";
    }
    echo "<hr>";
    // Añadir propiedad y valor
    echo "<h2>Añado clave y valor</h2>";
    $fruta['temporada'] = 'verano';
    foreach($fruta as $key => $valor){
      echo "$key - $valor <br>";
    }
    echo "<hr>";
    //Eliminar la propiedad sabor
    echo "<h2>Elimino clave sabor</h2>";
    unset($fruta['sabor']);
    foreach($fruta as $key => $valor){
      echo "$key - $valor <br>";
    }

    //Cambio el valor de 'color'
    $fruta['color'] = 'amarillo';

    echo "<h2>Cambio el valor de color</h2>";

    foreach($fruta as $key => $valor){
      echo "$key - $valor <br>";
    }

    //creo un nuevo array asociativo descartando una key
    $fruta2 = array_diff($fruta, ["amarillo"]);

    echo "<hr>";
    echo "<h2>Nuevo array sin el valor amarillo</h2>";
    //Visualizar los datos del nuevo array
    foreach($fruta2 as $key => $valor){
      echo "$key - $valor <br>";
    }
   ?>
</body>
</html>