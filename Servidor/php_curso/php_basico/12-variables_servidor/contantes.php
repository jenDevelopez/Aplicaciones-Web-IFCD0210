<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Constantes</title>
</head>
<body>
  <h1>Hola</h1>
  <?php 
      define('NOMBRE', 'Jennifer');
      function saludar(){
        return "<h1>Hola". NOMBRE . " </h1>";
      }

    echo saludar(NOMBRE);
  ?>
</body>
</html>