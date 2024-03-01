<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $nombres = array(
    'Juan Perez',
    'Maria Garcia',
    'Pedro Lopez',
    'Ana Martinez',
    'Sofia Gonzalez',
    'Miguel Rodriguez',
    'Laura Fernandez',
    'David Garcia',
    'Elena Perez',
    'Alberto López'
  );
  $premios = 3;
  function asignarGanadores($premios, $cantNombres)
  {
    $ganadores = array();
    $cantNombres -= 1;
    while (count($ganadores) < $premios) {
      $ganador = rand(0, $cantNombres);
      if (!in_array($ganador, $ganadores)) {
        $ganadores[] = $ganador;
      }
    }
    return $ganadores;
  }


  $listaGanadores = asignarGanadores($premios, count($nombres));
  $index = 1;
  foreach ($listaGanadores as $ganador) {
    global $index;
    echo "Ganador $index: $nombres[$ganador] <br>";
    $index++;
  }
  ?>
</body>

</html>