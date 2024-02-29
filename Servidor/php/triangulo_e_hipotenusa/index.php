<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Area Triangulo</title>
</head>

<body>
  <?php
  $cateto1 = 9;
  $cateto2 = 15;

  function areaTriangulo($cateto1, $cateto2)
  {
    return ($cateto1 * $cateto2) / 2;
  }

  function calcularHipotenusa($cateto1, $cateto2)
  {
    return sqrt(pow($cateto1, 2) + pow($cateto2, 2));
  }

  $areaDelTriangulo = areaTriangulo($cateto1, $cateto2);

  $hipotenusa = number_format(calcularHipotenusa($cateto1, $cateto2), 2);
  echo "<h2>El Area de triangulo con base: $cateto1 y altura: $cateto2 es $areaDelTriangulo</h2>";

  echo "<h2>La hipotenusa del triangulo es $hipotenusa</h2>";
  exit;
  ?>
</body>
</html>