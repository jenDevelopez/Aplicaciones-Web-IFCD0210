<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Básico</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <div class="container">

    <form action="index.php" method="get" autocomplete="off" autocapitalize="on">
      <div id="send" class="send">
        <img src="../send.svg" alt="icon send">
      </div>
      <div class=" form">


        <div>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre">
        </div>

        <div>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Escribe tu email">
        </div>

        <div>
          <label for="edad">Edad:</label>
          <input type="number" id="edad" name="edad" placeholder="Escribe tu edad">
        </div>

        <button type="submit">Enviar</button>
      </div>
    </form>
    <?php
           if(empty($_GET['nombre']) || empty($_GET['email']) || empty($_GET['edad'])){
            echo "<h1>Completa el formulario</h1>";
            http_response_code(404);
            exit;
          }else if ($_SERVER['REQUEST_METHOD'] == "GET") {
            echo "<h1>Datos recibidos</h1>";
            echo "<ul >";
            echo "<li>Nombre: " . $_GET['nombre'] . "</li>";
            echo "<li>Email: " . $_GET['email'] . "</li>";
            echo "<li>Edad: " . $_GET['edad'] . "</li>";
            echo "</ul>";
          }
          ?>
  </div>




</body>

</html>