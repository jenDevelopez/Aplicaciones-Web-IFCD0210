<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $numero = 4;
  function calcularFactorial($numero)
  {
    $factorial = 1;
    while ($numero > 1) {
      $factorial *= $numero;
      $numero--;
    }
    return $factorial;
  }
  $factorial = calcularFactorial($numero);
  echo "El factorial de $numero es $factorial <br>";

  function factorialRecursiva($numero)
  {

    if ($numero === 0) {
      return 1;
    } else {
      return $numero * factorialRecursiva($numero - 1);
    }
  }

  echo "El factorial de $numero es: " . factorialRecursiva($numero)
  ?>
</body>

</html>