<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Curso de Aplicaciones con tecnologias web IFCD210 | Ejercicios</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Ejercicios de Jennifer</h1>
  <h2>Listado de ejercicios</h2>
  <?php
    $ejercicios = array(
      "php_info" => "01-phpInfo/index.php",
      "hola_mundo" => "02-hola_mundo/index.php",
      "variables" => "03-Variables/index.php",
      "triangulo e hipotenusa" => "04-triangulo_e_hipotenusa/index.php",
      "foreach" => "05-foreach/index.php",
      "factorial" => "06-factorial/index.php",
      "variables_globales" => "07-variables_globales/index.php",
      "sorteo" => "08-sorteo/index.php",
      "array asociativo" => "09-array_asociativo/index.php",
      "arrays" => "10-arrays/index.php",
      "array multidimensional" => "11-array_multidimensional/index.php",
      "variables del servidor" => "12-variables_servidor/index.php",
      "formulario get"=> "13-formularios/formulario_get/index.php",
      "formulario post"=> "13-formularios/formulario_post/index.php",
      "concurso"=> "14-concurso/index.php",
      "validacion de formulario" => "15-validacion_formulario/index.php"
      )
  ?>
  <ol>
    <?php
    foreach ($ejercicios as $key => $value) {
      echo "
      <li>
        <a target='_blank' href='./$value'>$key</a>
      </li>
      ";
    }
    ?>
  </ol>
</body>
</html>