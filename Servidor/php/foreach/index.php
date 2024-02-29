<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>For Each</title>
</head>

<body>
  <?php
  $alumnos = ["Felipe Perez", "Pedro Piquera", "Pablo Motos", "Alicia Martinez"];

  foreach ($alumnos as $alumno) {
    if (str_starts_with(strtolower($alumno),'p')){
      echo "<h2>Hola $alumno</h2> <br> ";
    }
  }


  ?>
</body>

</html>