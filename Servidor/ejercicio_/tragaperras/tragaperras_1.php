<?php 
$numProbabilidades = array(1,2,3,4,5,6,7,8);
function generarFrutaAleatoria($arrayPosiciones) {
  $posicion = rand(0, count($arrayPosiciones) -1);
  return "$arrayPosiciones[$posicion]";

}

$fruta1 = generarFrutaAleatoria($numProbabilidades);
$fruta2 = generarFrutaAleatoria($numProbabilidades);
$fruta3 = generarFrutaAleatoria($numProbabilidades);

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Tragaperras
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <h1>Tragaperras</h1>
<?php
  print "  <table style=\"margin-left: auto; margin-right: auto; border: black 4px solid; border-spacing: 10px;\">\n";
  print "    <tr>\n";
  // Se muestran las tres imágenes de la combinación actual
  print "      <td style=\"border: black 4px solid; padding: 10px\">"
    . "<img src=\"img/frutas/$fruta1.svg\" width=\"160\" alt=\"Imagen\"></td>\n";
  print "      <td style=\"border: black 4px solid; padding: 10px\">"
    . "<img src=\"img/frutas/$fruta2.svg\" width=\"160\" alt=\"Imagen\"></td>\n";
  print "      <td style=\"border: black 4px solid; padding: 10px\">"
    . "<img src=\"img/frutas/$fruta3.svg\" width=\"160\" alt=\"Imagen\"></td>\n";
  print "    </tr>\n";
  print "  </table>\n";
  ?>

  <footer>
    <p>Jennifer Lopez Montero</p>
  </footer>
</body>
</html>